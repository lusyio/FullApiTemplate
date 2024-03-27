
const dateFormatter = {
    dows: [],

    formatToQs: function(date) {
        if(!date) { return null; }
        let d = date && typeof date.getUTCDate === 'function' ? date : new Date(date);
        if(isNaN(d.getDate())) { return null; }
        let v = parseInt((d.getTime()/1000));
        return v;
    },
    formatFromQs: function(stringDate) {
        if(!stringDate || stringDate === 'null') { return null; }
        if(isNaN(stringDate)) { return null; }
        let intVal = parseInt(stringDate)*1000;
        let d = new Date(intVal);
        return isNaN(d.getDate()) ? null : d;
    },
    prepareMomentObj(momentObj) {
        let offset = window._$http.getTimezoneOffset();
        if(offset < 0) {
            momentObj.subtract((offset*-1), 'minutes');
        } else {
            momentObj.add(offset, 'minutes')
        }
        return momentObj;
    },

    validHm(t) {
        if(!t) { return 0; }
        if(typeof t !== 'string') { return 0; }
        t = t.split(' ').join('');
        if(t.length !== 5) { return 0; }
        if(t[2] !== ':') { return 0; }
        for(let i = 0; i < t.length; i++) {
            if(i === 2) { continue; }
            if(isNaN(t[i])) { return 0; }
        }
        let hour = window._$numberHelpers.int(t[0]+''+t[1]);
        let minute = window._$numberHelpers.int(t[3]+''+t[4]);
        if(hour > 24) { return 0; }
        if(minute > 59) { return 0; }
        if(hour === 24 && minute > 0) { return 0; }
        return 1;
    },
    validTime(t) {
        if(!t) { return 0; }
        if(typeof t !== 'string') { return 0; }
        t = t.split(' ').join('');
        if(t.length !== 5) { return 0; }
        if(t[2] !== ':') { return 0; }
        for(let i = 0; i < t.length; i++) {
            if(i === 2) { continue; }
            if(isNaN(t[i])) { return 0; }
        }
        let minute = parseInt(t[0]+''+t[1]);
        let second = parseInt(t[3]+''+t[4]);
        if(second > 59 || second < 0) { return 0; }
        if(minute > 59 || minute < 0) { return 0; }
        return 1;
    },
    formatAgo(rawTimeStamp, format = null) {
        return new window._$moment(rawTimeStamp, format).fromNow(true);

    }
};



window._$dateFormatter = dateFormatter;
export default dateFormatter;
