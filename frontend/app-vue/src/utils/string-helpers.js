const StringHelpers = {
    prepareString(s) {
        if(typeof s === 'undefined') { return ''; }
        s = s === null ? '' : String(s);
        return s.trim();
    },
    purifyString(s) {
        if(typeof s === 'undefined') { return ''; }
        s = s === null ? '' : String(s);
        s = s.trim().toLowerCase();
        return s;
    },
    ucFirst(str) {
        if (!str) { return str; }
        str = ''+str;
        return str[0].toUpperCase() + str.slice(1);
    },
    nl2br( str ) {
        return str.replace(/([^>])\n/g, '$1<br/>');
    },
    abbr(str, l) {
        let result = '';
        str = ''+str;
        let splitted = str.split(' ').slice(0, l);
        for(let i = 0; i < splitted.length; i++) {
            result += splitted[i][0];
        }
        return result;
    },
    getSearchString(st) {
        st = st ? st.toString().toLowerCase() : '';
        st.replace(/&nbsp;/g, '').replace(/  +/g, ' ').replace(/ё/g, 'е').replace(/й/g, 'и');
        return st;
    },

    snakeToCamel(s) {
        let res = s.replace(/(\_\w)/g, function(k) {
            return k[1].toUpperCase();
        });

        return res;
    }

};

window._$stringHelpers = StringHelpers;

export default StringHelpers;
