const positionHelpers = {
    isBottomAchieved: function(opts = {}) {
        let el1 = opts.el ? opts.el : document.body;
        let el2 = opts.el ? opts.el : window;
        let height, st;
        if(el2 === window) {
            height = window.innerHeight;
            st = window.scrollY;
        } else {
            height = el1.clientHeight;
            st = el2.scrollTop;
        }
        let footerOffset = opts.offset ? opts.offset : 400;
        if(!el1) { return false; }
        let v1 = (el1.scrollHeight - st - height);
        return (v1 <= footerOffset);
    }
};

window._$positionHelpers = positionHelpers;

export default positionHelpers;
