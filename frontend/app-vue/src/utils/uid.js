let uid = function () {
    return '_' + Math.random().toString(36).substr(2, 9);
};
window._$uid = uid;
export default uid;
