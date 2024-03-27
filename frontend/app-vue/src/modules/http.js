import axios from 'axios';
import store from '@/store/index.js';
import queryString from 'query-string';


const http = {
    inited: false,
    timezoneOffset: 0,
    timezoneOffsetInited: false,
    init() {
        if (this.inited) { return; }
        http.setDefaults();
        this.inited = true;
        http.getTimezoneOffset();
    },
    removeTrailingSlash(s) {
        return s.replace(/\/$/, "");
    },
    stringifyArrayIntoQlqString(arr) {
        if(!Array.isArray(arr)) { return ''; }
        return arr.join('qlq');
    },
    decodeStringIntoQlqArray(s) {
        s = window._$stringHelpers.prepareString(s);
        return s.split('qlq');
    },
    purifyQs(qs, proto) {
        for(let prop in qs) {
            let v = qs[prop];
            if(window._$validators.isValueBlank(v)) {
                delete qs[prop];
                continue;
            }
            if(proto && v == proto[prop]) {
                delete qs[prop];
                continue;
            }
            if(v === null || v === 'null') {
                delete qs[prop];
            }
        }
        return qs;
    },
    buildLink(link, params, opts) {
        let resultLink = link;
        opts = opts ? opts : {};
        if(params) {
            let paramsCloned = Object.assign({}, params);
            for(let prop in paramsCloned) {
                if(opts.stringifyParams && Array.isArray(paramsCloned[prop])) {
                    paramsCloned[prop] = http.stringifyArrayIntoQlqString(paramsCloned[prop]);
                }
            }
            http.purifyQs(paramsCloned);
            if(Object.keys(params).length) {
                let qs = queryString.stringify(paramsCloned);
                if(qs && qs.length) {
                    resultLink += '?'+qs;
                }
            }
        }
        return resultLink;
    },
    rebuildLink($route, opts) {
        let resultLink = $route.path;
        if(opts) {
            let qsParams = Object.assign({}, $route.query);
            if(opts.addQuery) {
                for(let prop in opts.addQuery) {
                    qsParams[prop] = opts.addQuery[prop];
                }
            }
            if(opts.removeQuery) {
                if(typeof opts.removeQuery === 'string') {
                    delete qsParams[opts.removeQuery];
                } else {
                    for(let prop of opts.removeQuery) {
                        delete qsParams[prop];
                    }
                }
            }
            let qs = queryString.stringify(qsParams);
            if(qs && qs.length) {
                resultLink += '?'+qs;
            }
        }
        return resultLink;
    },
    async preload(url) {
        await http.getFile(url);
        return true;
    },
    setDefaults() {
        axios.defaults.headers.common = {
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json'
        };
        axios.defaults.baseURL = 'http://localhost:8000/api';
        axios.defaults.withCredentials = true;
    },
    getTimezoneOffset() {
        if(http.timezoneOffsetInited) { return http.timezoneOffset; }
        let currentOffset = (new Date()).getTimezoneOffset();
        http.timezoneOffset = currentOffset;
        http.timezoneOffsetInited = true;
        return currentOffset;
    },
    async getFile(path) {
        let resp = await axios({ url: path, baseURL: '/' });
        if(resp) { return resp.data; }
        return null;
    },
    async get(path, args, additional) {
        let headers = {};
        headers['Content-Type'] = 'application/json';

        let resp;
        try {
            resp = await axios.get(path, {
                params: args,
                headers: headers
            });
        } catch (e) {
            let handled = await this.handleError(e);
            if(!handled) { return handled; }
            return (await http.get(path, args));
        }
        if (!resp) {
            return null;
        }
        if (resp.data) {
            return resp.data;
        }
        return null;
    },
    async post(path, args) {
        this.handleArgs(args);
        let headers = {};
        let resp;
        try {
            resp = await axios.post(path, args, {headers: headers });
        } catch (e) {
            let handled = await this.handleError(e);
            if(!handled) { return handled; }
            return (await http.post(path, args));
        }
        if (!resp) {
            return null;
        }
        if (resp.data) {
            return resp.data;
        }
        return null;
    },
    async patch(path, args) {
        this.handleArgs(args);
        let headers = {};
        let resp;
        try {
            resp = await axios.patch(path, args, {headers: headers });
        } catch (e) {
            let handled = await this.handleError(e);
            if(!handled) { return handled; }
            return (await http.patch(path, args));
        }
        if (!resp) {
            return null;
        }
        if (resp.data) {
            return resp.data;
        }
        return null;
    },

    handleArgs(args) {
        if(args instanceof FormData) {
            for (const pair of args.entries()) {
                const [key, value] = pair;
                if (value === 'null') {
                    args.set(key, '');
                }

                if (value === 'true') {
                    args.set(key, '1')
                }

                if (value === 'false') {
                    args.set(key, '0')
                }
            }
        }
    },


    async delete(path, args) {
        this.handleArgs(args);
        let headers = {};
        let resp;
        try {
            resp = await axios.delete(path,{headers: headers });
        } catch (e) {
            let handled = await this.handleError(e);
            if(!handled) { return handled; }
            return (await http.delete(path, args));
        }
        if (!resp) {
            return null;
        }
        if (resp.data) {
            return resp.data;
        }
        return null;
    },

    async file(path, args) {
        let headers = {
            'Content-Type': 'multipart/form-data',
        };
        let resp;
        try {
            resp = await axios.post(path, args, {
                headers: headers
            });
        } catch (e) {
            let handled = await this.handleError(e);
            if(!handled) { return handled; }
            resp = await axios.post(path, args, {
                headers: headers
            });
            return resp;
        }
        if (!resp) {
            return null;
        }
        if (resp.data) {
            return resp.data;
        }
        return null;
    },
    async handleError(e) {
        let respText = '';
        try {
            respText = e.response.data;
        } catch(e) {

        }
        if(respText === null) { respText = ''; }
        if (e) {
            if (e.response) {
                if (e.response.data) {
                    if(e.response.status === 401) {
                        store.dispatch('logout');
                        return null;
                    }
                    /*
                    if(e.response.status === 403) {
                        if(respText.no_domain_access) {
                            store.commit('setUser', respText);
                        }
                    }
                    if(e.response.status === 422) {
                        if(e.response.data) {
                            if(e.response.data.redirect === '/sign-in') {
                                store.dispatch('logout');
                                return false;
                            }
                        }
                    }
                    if(e.response.status === 500) {
                        if(e.response.data) {
                            if(e.response.data.message) {
                                let tokenExpired = false;
                                try {
                                    let j = JSON.parse(e.response.data.message);
                                    tokenExpired = j.msg === 'token_expired';
                                } catch(e) {

                                }
                                if(tokenExpired && 0) {
                                    let refreshed = await this.refresh();

                                    if(refreshed) {
                                        return 1;
                                    }
                                    return 0;
                                }
                            }
                        }

                    }
                     */
                }
            }
        }
        return null;
    }
};

http.init();

window._$http = http;

export default http;
