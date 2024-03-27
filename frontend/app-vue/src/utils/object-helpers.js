const objectHelpers = {

    extractKeysOfArrayObject(arr, key) {
        let result = [];
        if(!Array.isArray(arr)) { return result; }
        for(let item of arr) {
            result.push(item[key]);
        }
        return result;
    },
    shuffleArray(array) {
        let currentIndex = array.length,  randomIndex;

        // While there remain elements to shuffle.
        while (currentIndex != 0) {

            // Pick a remaining element.
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex--;

            // And swap it with the current element.
            [array[currentIndex], array[randomIndex]] = [
                array[randomIndex], array[currentIndex]];
        }

        return array;
    },
    divideArray(arr, count = 2) {
        let result = [];
        for(let i = 0; i < arr.length; i++) {
            if(!result.length) {
                result.push([]);
            }
            let item = arr[i];
            if(result[result.length-1].length < count) {
                result[result.length-1].push(item);
            } else {
                result.push([item]);
            }
        }
        return result;
    },
    getArrayOfStrings(inc) {
        let validArray = [];
        if(Array.isArray(inc)) {
            for(let item of inc) {
                validArray.push(''+item);
            }
        }
        return validArray;
    },
    deepMerge (...sources) {
        let acc = {}
        for (const source of sources) {
            if (source instanceof Array) {
                if (!(acc instanceof Array)) {
                    acc = []
                }
                // acc = [...acc, ...source]
                acc = [...source]
            } else if (source instanceof Object) {
                for (let [key, value] of Object.entries(source)) {
                    if (value instanceof Object && key in acc) {
                        value = deepMerge(acc[key], value)
                    }
                    acc = {
                        ...acc,
                        [key]: value
                    }
                }
            }
        }

        return acc
    },
    set (object, path, value) {
        return path.split('.').reduce((o, p, i) => {
            o[p] = path.split('.').length === ++i ? value : o[p] || {}
        }, object)
    },
    get (object, path, defaultValue = null) {
        return path.split('.').reduce((o, p) => o && typeof o[p] !== 'undefined' && o[p] != null ? o[p] : defaultValue, object)
    },
    extractUniqueValidValues(incomingValue, availbleValuesObject) {
        if(!availbleValuesObject) { return []; }
        let resultUniqueValue = {};
        let realValue = typeof incomingValue === 'string' || typeof incomingValue === 'number' ? [incomingValue] : (Array.isArray(incomingValue) ? incomingValue : []);
        for(let item of realValue) {
            let key = ''+item;
            if(typeof availbleValuesObject[key] === 'undefined') { continue; }
            resultUniqueValue[key] = true;
        }
        return Object.keys(resultUniqueValue);
    },

    extractUniqueValidValue(incomingValue, availbleValuesObject, defaultValue) {
        let resultValue = typeof defaultValue === 'undefined' ? null : defaultValue;
        if(!availbleValuesObject) { return resultValue; }
        let realValue = ''+incomingValue;
        if(typeof availbleValuesObject[realValue] !== 'undefined') {
            resultValue = realValue;
        }
        return resultValue;
    },
    mapToObj(arr, k = 'id') {
        let r = {};
        for(let prop in arr) {
            let item = arr[prop];
            r[item[k]] = item;
        }
        return r;
    },
    mapToArr(obj, k = 'id') {
        let r = {};
        for(let prop in obj) {
            let item = obj[prop];
            r[item[k]] = item;
        }
        return r;
    },
    extractUniqueValidValuesFromIdentifiedArray(incomingValue, availableValuesArray, opts) {
        opts = opts ? opts : {};
        let idKey = opts.idKey ? opts.idKey : 'id';
        let resultUniqueValue = {};
        if(!Array.isArray(availableValuesArray)) { return Object.keys(resultUniqueValue); }
        let realValue = typeof incomingValue === 'string' || typeof incomingValue === 'number' ? [''+incomingValue] : (Array.isArray(incomingValue) ? incomingValue : []);
        let availableMap = {};
        for(let item of availableValuesArray) {
            availableMap[item[idKey]] = item;
        }
        for(let item of realValue) {
            let key = ''+item;
            if(typeof availableMap[key] === 'undefined') { continue; }
            resultUniqueValue[key] = true;
        }
        return Object.keys(resultUniqueValue);
    },
    getRandomFromArray(items) {
        return items[Math.floor(Math.random()*items.length)];
    }

};

window._$objectHelpers = objectHelpers;

export default objectHelpers;
