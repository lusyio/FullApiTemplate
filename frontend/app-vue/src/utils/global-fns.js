


window.blurActiveElement = function() {
    if(document.activeElement) {
        if(typeof document.activeElement.blur === 'function') {
            document.activeElement.blur();
        }
    }
};
window.isCharacterKeyPress = function(e) {
    let ignoredKeycodes = [16,17,13,20,0,18];
    return ignoredKeycodes.indexOf(e.keyCode) === -1;
};


window.stopAudio = function(exceptId) {
    var aels = document.getElementsByTagName('audio');
    for(var i = 0; i < aels.length; i++) {
        if(exceptId && aels[i].id === exceptId) { continue; }
        aels[i].pause();
    }
}

window.stopVideo = function(exceptId) {
    var vels = document.getElementsByTagName('video');
    for(var i = 0; i < vels.length; i++) {
        if(exceptId && vels[i].id === exceptId) { continue; }
        vels[i].pause();
    }
}

window.getLocalStorageValue = function(v) {
    let t = localStorage.getItem(v);
    if(t === 'true') { return true; }
    return (t === 'false' || t === 'null') ? false : t;
}


window.cltm = function(obj, key) {
    if(obj[key]) { clearTimeout(obj[key]); }
};
window.cltms = function(obj, keys) {
    for(let i = 0; i < keys.length; i++) {
        window.cltm(obj, keys[i]);
    }
};

window.preventWindowInputTabKeys = function() {
    let els = document.querySelectorAll('input, textarea');
    if(!els || !els.length) { return; }
    els.forEach((el) => {
       if(typeof el.dataset.nativeTabIndex === 'undefined') {
           el.dataset.nativeTabIndex = el.tabIndex ? el.tabIndex : 0;
       }
       el.tabIndex = -1;
    });
};

window.activateInputTabKeysOfNode = function(nodeEl) {
  try {
      let els = nodeEl.querySelectorAll('input, textarea');
      if(!els || !els.length) { return; }
      els.forEach((el) => {
          el.tabIndex = 1;

      });
  } catch(e) {

  }
};

window.resetWindowInputTabKeys = function() {
    let els = document.querySelectorAll('input, textarea');
    if(!els || !els.length) { return; }
    els.forEach((el) => {
        if(typeof el.dataset.nativeTabIndex === 'undefined') {
            el.dataset.nativeTabIndex = el.tabIndex ? el.tabIndex : 0;
        }
        el.tabIndex = el.dataset.nativeTabIndex ? el.dataset.nativeTabIndex : 0;
    });
};


window._$preload = function() {
    for (let i = 0; i < arguments.length; i++) {
        arguments[i] = new Image();
        arguments[i].src = arguments[i];
    }
};


export default null;