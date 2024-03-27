import uaParserJs from 'ua-parser-js';
import uid from './../../utils/uid';
const getWindowSize = function() {
    return {
        innerWidth: window.innerWidth,
        innerHeight: window.innerHeight,
        outerWidth: window.outerWidth,
        outerHeight: window.outerHeight,
        resized: uid(),
    }
};

const mobileBreakpoint = 420;
const tabletBreakpoint = 992;

function getClearState() {
    return {
        innerWidth: 0,
        outerWidth: 0,
        innerHeight: 0,
        outerHeight: 0,
        resized: uid(),
        resizeDebounced: uid(),
        isSafari: false,
        isIos: false,
        isIe: false,
        orientation: '',
        deviceType: 'desktop',
        deviceReady: false,
        isMobile: false,
        isSmallDesktop: false,
        scrollTop: 0,
        lastScrollEvent: {},
        scrollBonus: 380,
        isDarkMode: false,
        isOnline: window.navigator.onLine
    }
}

let resizeTm = false;

export default {
    state: getClearState,
    mutations: {
        setScrollOffset(state, event) {
            state.scrollTop = window.scrollY;
            state.lastScrollEvent = event;
        },
        setDeviceData(state, opts) {
            Object.assign(state, opts);
            state.isMobile = state.innerWidth < 1000;
            state.isSmallDesktop = state.innerWidth < 1050;
            state.orientation = state.innerWidth < state.innerHeight ? 'portait' : 'horizontal';
            if(state.innerWidth < mobileBreakpoint) { state.deviceType = 'mobile'; return; }
            if(state.innerWidth < tabletBreakpoint) { state.deviceType = 'tablet'; return; }
            state.deviceType = 'desktop';
        },
        setDeviceOpts(state, opts) {
            Object.assign(state, opts);
        },

        setOnline(state, value) {
            state.isOnline = value;
        }
    },
    actions: {
        initDevice(store) {
            const device = uaParserJs();
            window.uaDevice = device;
            let opts = getWindowSize();
            opts.isSafari = device.browser.name.toLowerCase().indexOf('safari') !== -1;
            opts.isIos = device.device.vendor === 'Apple' || device.device.model === 'iPhone';
            if(opts.isIos) {
                let html = document.querySelector('html');
                if(html) {
                    html.classList.add('is-ios');
                }
            }
            opts.isIe = device.browser.name.toLowerCase().indexOf('explorer') !== -1 || device.browser.name.toLowerCase().indexOf('trident') !== -1;
            opts.deviceReady = true;
            store.commit('setDeviceData', opts);
            store.commit('setScrollOffset');
            const recalculateScollOffset = function(e) {
                store.commit('setScrollOffset', e);
            };

            const setNewDebounceUid = function() {
                store.commit('setDeviceOpts', { resizeDebounced: uid() });
            }

            const recalculateWindowSize = function() {
                store.commit('setDeviceData', getWindowSize());
                if(resizeTm) { clearTimeout(resizeTm); }
                resizeTm = setTimeout(setNewDebounceUid, 250);
            };

            window.addEventListener('resize', recalculateWindowSize);
            window.addEventListener('scroll', recalculateScollOffset);
        },
        initOnline(store) {
            window.addEventListener('online', (e) => {
                store.commit('setOnline', true);
                console.log('Пользователь подключился к интернету');
            });

            window.addEventListener('offline', (e) => {
                store.commit('setOnline', false)
                console.log('Потеряно интернет-соединение');
            });
        }
    }
};
