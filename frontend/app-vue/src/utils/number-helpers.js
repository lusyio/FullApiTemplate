const numberHelpers = {
    toFixed(a, b = 2) {
        let c = a.toString().split('.');
        if (!c[1]) {
            return a;
        }
        if (c[1].toString().length < b) {
            return a;
        }
        return parseFloat(c[0] + '.' + (c[1].substr(0, b)));
    },
    anInt(a) {
        return !isNaN(a) && parseInt(a) == a;
    },
    anFloat(a) {
        return !isNaN(a) && parseFloat(a) == a;
    },
    float(a) {
        let b = parseInt(a);
        return isNaN(b) ? 0 : b;
    },
    int(a) {
        let b = parseInt(a);
        return isNaN(b) ? 0 : b;
    },
    format(n) {
        n = parseFloat(n);
        n = isNaN(n) ? 0 : n;
        return n.toLocaleString('en-US');
    },
    formatDecInt(n) {
        let result = {};
        let v = this.splitIntoIntDec(n);
        result.dec = this.s2(v.dec);
        result.int = this.format(v.int);
        return result;
    },
    splitIntoIntDec(number, decToFixed = 3) {
        let n = '' + number;
        if (n.indexOf('.') === -1) {
            return {
                int: number,
                dec: '0',
                decTruncuted: '0'
            }
        } else {
            n = n.split('.');
            let dec = '' + n[1];
            let decTruncuted = dec;
            if (decToFixed !== null) {
                if (decTruncuted.length < decToFixed) {
                    for (let i = 0; decTruncuted.length < decToFixed; i++) {
                        decTruncuted += '0';
                    }
                } else if (decTruncuted.length > decToFixed) {
                    decTruncuted = dec.substring(0, 3);
                }
            }
            return {
                int: n[0],
                dec: dec,
                decTruncuted: decTruncuted
            }
        }

    },
    formatAlt(n) {
        n = parseFloat(n);
        n = isNaN(n) ? 0 : n;
        return n.toLocaleString('en-US');
    },
    s2(a) {
        if (a > 10) {
            return a;
        }
        a = a.toString();
        if (a.length < 2) {
            return '0' + a;
        }
        return a;
    },
    s2Min(a) {
        let n = '' + numberHelpers.float(a);
        if (n.indexOf('.') === -1) {
            return n + '.00';
        }
        n = n.split('.');
        return n[0] + '.' + numberHelpers.s2(n[1]);
    },
    stringToNumber(v) {
        if (typeof v === 'undefined' || v === null) {
            return '';
        }
        return v.toString().replace(/[^0-9.]/g, '');
    },
    stringIsNumber(string) {
        return /^[0-9]+(.[0-9]+)?$/.test(string);
    },
    replaceNumbers(string, char) {
        let splitted = string.split('');
        for (let i = 0; i < splitted.length; i++) {
            if (!this.stringIsNumber(splitted[i])) {
                continue;
            }
            splitted[i] = char;
        }
        return splitted.join('');
    },
    randomInteger(min, max) {
        let rand = min - 0.5 + Math.random() * (max - min + 1);
        return Math.round(rand);
    },
    removeNonNumbers(string) {
        let splitted = string.split('');
        for (let i = 0; i < splitted.length; i++) {
            if (this.stringIsNumber(splitted[i])) {
                continue;
            }
            splitted.splice(i, 1);
            i--;
        }
        return splitted.join('');
    },
    normalizeFloat(value) {
        if (typeof value === 'string') {
            return value.replace(/(-?\d)[.,](-?\d)/g, function (match, fVal, sVal) {
                if (isNaN(parseInt(fVal))) {
                    fVal = 0;
                }
                if (isNaN(parseInt(sVal))) {
                    sVal = 0;
                }
                if (sVal < 0) {
                    sVal = 0;
                }
                if (fVal == 0 && sVal > 0) {
                    return [fVal, sVal].join('.');
                } else {
                    if (sVal <= 0) {
                        return fVal;
                    }
                    return [fVal, sVal].join('.');
                }
            });
        }
        return value;
    },
    minus(a, b) {
        let decimalsLengthA = this.countDecimals(a);
        let decimalsLengthB = this.countDecimals(b);
        let maxDecimalsLength = decimalsLengthA > decimalsLengthB ? decimalsLengthA : decimalsLengthB;
        let val = a - b;
        return val.toFixed(maxDecimalsLength);

    },
    countDecimals(value) {
        if (Math.floor(value) === value) return 0;
        return value.toString().split(".")[1].length || 0;
    },
    reversePlusMinus(stringNumber) {
        let n = '' + stringNumber;
        if (!n.length) {
            return stringNumber;
        }
        if(n[0] === '-') {
          //  n = n.replace('-','',n);
        } else {
            if(parseFloat(n) > 0) {
                n = '+'+n;
            }
        }
        return n;
    }
};

window._$numberHelpers = numberHelpers;

export default numberHelpers;
