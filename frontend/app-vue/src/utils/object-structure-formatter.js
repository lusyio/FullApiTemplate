const formatter = {
    format(proto, target, opts = {}) {
        target = target && typeof target === "object" ? target : {};
        for (let prop in proto) {
            let v1 = proto[prop];
            let v2 = target[prop];
            if (typeof v1 === "number" || v1 === '0.00') {
                let isInt = v1.toString().indexOf(".") === -1;
                if (isInt) {
                    let intv2 = parseInt(v2);
                    v2 = intv2 == v2 ? intv2 : 0;
                    target[prop] = v2;
                } else {
                    let floatv2 = parseFloat(v2);
                    v2 = floatv2 == v2 ? floatv2 : 0;
                    target[prop] = v2;
                }
                continue;
            } // number validated
            if (typeof v1 === "string") {
                try {
                    v2 = v2.toString();
                } catch (e) {
                    v2 = v1;
                }
                target[prop] = v2;
                continue;
            } // string validated
            if (typeof v1 === "object") {
                if (v1) {
                    if (Array.isArray(v1)) {
                        v2 = Array.isArray(v2) ? v2 : [];
                    } else {
                        if (typeof v2 !== "object" || !v2 || Array.isArray(v2)) {
                            v2 = JSON.parse(JSON.stringify(v1));
                        }
                        if (opts.deep) {
                            v2 = this.format(v1, v2);
                        }
                    }
                } else {
                    v2 = null;
                }
                target[prop] = v2;
                continue;
            } // object and null validated
            if (typeof v1 === "boolean") {
                if (typeof v2 === 'undefined') {
                    v2 = v1;
                } else {
                    v2 = Boolean(v2);
                }
                target[prop] = v2;
            } // boolean validated
        }
        if(opts.purify) {
            target = this.purifyObjectByStructure(proto, target);
        }
        return target;
    },

    purifyObjectByKeys(opts) {
        for(let prop in opts.object) {
            if(opts.except.indexOf(prop) !== -1) { continue; }
            delete opts.object[prop];
        }
    },
    purifyObjectByStructure(proto, target) {
        if (typeof proto !== 'object' || typeof target !== 'object') {
            return target;
        }

        if (Array.isArray(proto)) {
            if (Array.isArray(target)) {
                return target.map((item, index) => this.purifyObjectByStructure(proto[0], item));
            } else {
                return [];
            }
        }

        const result = {};
        for (const key in proto) {
            if (typeof proto[key] === 'object') {
                if (key in target) {
                    result[key] = this.purifyObjectByStructure(proto[key], target[key]);
                }
            } else if (key in target) {
                result[key] = target[key];
            }
        }
        return result;
    },

    buildArray(obj, opts) {
        let arr = [];
        for (let prop in obj) {
            if (opts.id_key) {
                obj[opts.id_key] = prop;
            }
            arr.push(obj[prop]);
        }
        return arr;
    },

    buildAllValuesToArray(obj) {
        if (typeof obj !== 'object' || obj === null) {
            return [obj];
        } else if (Array.isArray(obj)) {
            return obj.reduce((acc, val) => acc.concat(this.buildAllValuesToArray(val)), []);
        } else {
            return Object.values(obj).reduce((acc, val) => acc.concat(this.buildAllValuesToArray(val)), []);
        }
    },

    formatArray(arr, proto, opts = {}) {
        if (!Array.isArray(arr)) {
            return [];
        }
        for (let i = 0; i < arr.length; i++) {
            arr[i] = formatter.format(proto, arr[i], opts);
        }
        return arr;
    },
    buildMap(opts) {
        let a = {};
        let key = opts.id_key ? opts.id_key : 'id';
        for(let i = 0; i < opts.array.length; i++) {
            let item = opts.array[i];
            a[item[key]] = item;
        }
        return a;
    }
};

window._$objectStructureFormatter = formatter;

export default formatter;
