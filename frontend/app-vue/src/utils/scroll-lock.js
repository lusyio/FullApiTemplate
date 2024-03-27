const scrollLock = {
    isLocked: false,
    lock() {
        if(scrollLock.isLocked) { return; }
        document.body.addEventListener('mousewheel', this.handleLockedEvent, { passive: false });
        document.body.addEventListener('touchmove', this.handleLockedEvent, { passive: false });
        scrollLock.isLocked = true;
    },
    unlock() {
        document.body.removeEventListener('mousewheel', this.handleLockedEvent);
        document.body.removeEventListener('touchmove', this.handleLockedEvent);
        scrollLock.isLocked = false;
    },
    handleLockedEvent(e) {
        if(e && e.preventDefault) {
            e.preventDefault();
        }

    }
};


window._$scrollLock = scrollLock;

export default scrollLock;
