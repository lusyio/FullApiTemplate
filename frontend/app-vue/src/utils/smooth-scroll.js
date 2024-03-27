let defaults = {
    speed: 500,
    clip: true,
    offset: 0,
};


let extend = function () {
    let merged = {};
    Array.prototype.forEach.call(arguments, function (obj) {
        for (let key in obj) {
            if (!obj.hasOwnProperty(key)) return;
            merged[key] = obj[key];
        }
    });
    return merged;
};



let getDocumentHeight = function () {
    return Math.max(
        document.body.scrollHeight, document.documentElement.scrollHeight,
        document.body.offsetHeight, document.documentElement.offsetHeight,
        document.body.clientHeight, document.documentElement.clientHeight
    );
};


let getEndLocation = function (anchor, offset, clip) {
    let location = 0;
    if (anchor.offsetParent) {
        do {
            location += anchor.offsetTop;
            anchor = anchor.offsetParent;
        } while (anchor);
    }
    location = Math.max(location - offset, 0);
    if (clip) {
        location = Math.min(location, getDocumentHeight() - window.innerHeight);
    }
    return location;
};




let SmoothScroll = function (selector) {

    let smoothScroll = {}; // Object for public APIs
    let toggle, animationInterval;

    smoothScroll.cancelScroll = function (noEvent) {
        cancelAnimationFrame(animationInterval);
        animationInterval = null;
    };

    smoothScroll.animateScroll = function (anchor, toggle, options) {

        smoothScroll.cancelScroll();

        let _settings = defaults;

        // Selectors and variables
        let isNum = Object.prototype.toString.call(anchor) === '[object Number]' ? true : false;
        let anchorElem = isNum || !anchor.tagName ? null : anchor;
        if (!isNum && !anchorElem) return;
        let startLocation = window.pageYOffset;
        let endLocation = isNum ? anchor : getEndLocation(anchorElem, parseInt((typeof _settings.offset === 'function' ? _settings.offset(anchor, toggle) : _settings.offset), 10), _settings.clip); // Location to scroll to
        let distance = endLocation - startLocation; // distance to travel
        let documentHeight = getDocumentHeight();
        let timeLapsed = 0;
        let speed = 240;
        let start, percentage, position;
        let stopAnimateScroll = function (position, endLocation) {
            let currentLocation = window.pageYOffset;
            if (position == endLocation || currentLocation == endLocation || ((startLocation < endLocation && window.innerHeight + currentLocation) >= documentHeight)) {
                smoothScroll.cancelScroll(true);
                start = null;
                animationInterval = null;
                return true;

            }
        };

        /**
         * Loop scrolling animation
         */
        let loopAnimateScroll = function (timestamp) {
            if (!start) { start = timestamp; }
            timeLapsed += timestamp - start;
            percentage = speed === 0 ? 0 : (timeLapsed / speed);
            percentage = (percentage > 1) ? 1 : percentage;
            position = startLocation + (distance * percentage);
            window.scrollTo(0, Math.floor(position));
            if (!stopAnimateScroll(position, endLocation)) {
                animationInterval = window.requestAnimationFrame(loopAnimateScroll);
                start = timestamp;
            }
        };

        if (window.pageYOffset === 0) {
            window.scrollTo(0, 0);
        }


        // Start scrolling animation
        smoothScroll.cancelScroll(true);
        window.requestAnimationFrame(loopAnimateScroll);

    };



    let init = function () {
        let anchor;
        if(isNaN(selector)) {
            anchor = document.querySelector(selector);
            if (!anchor) { return; }
        } else {
            anchor = selector;
        }

        smoothScroll.animateScroll(anchor, toggle);
    };
    init();
    return smoothScroll;

};

window._$smoothScroll = SmoothScroll;
export default SmoothScroll;
