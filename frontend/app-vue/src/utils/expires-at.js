import {reactive} from "vue";
import moment from "moment/moment";

const expiresAt = {
    recalculateExpiresAtObj(expiresAtObj) {
        let now = new moment();

        let diffInMs = moment(expiresAtObj.momentObj).diff(now);
        const duration = moment.duration(diffInMs);

        expiresAtObj.secondsTotal = diffInMs / 1000;
        expiresAtObj.minutesTotal = diffInMs / 1000 / 60;
        expiresAtObj.hoursTotal = diffInMs / 1000 / 60 / 60;
        expiresAtObj.daysTotal = diffInMs / 1000 / 60 / 60 / 24;

        expiresAtObj.days = Math.floor(duration.asDays());
        expiresAtObj.hours = duration.hours();
        expiresAtObj.minutes = duration.minutes();
        expiresAtObj.seconds = duration.seconds();
        let exampleTime = {};
        let keysToAssign = ['secondsTotal', 'minutesTotal', 'hoursTotal', 'daysTotal'];
        for (let keyToAssign of keysToAssign) {
            exampleTime[keyToAssign] = expiresAtObj[keyToAssign];
        }
        let underscoreKeys = ['secondsTotal', 'minutesTotal', 'hoursTotal', 'daysTotal'];
        for (let uc of underscoreKeys) {
            expiresAtObj['__' + uc] = Math.floor(expiresAtObj[uc]);
        }

        expiresAtObj.isExpired = expiresAtObj.secondsTotal < 1;
        if (expiresAtObj.isExpired) {
            for (let key of keysToAssign) {
                expiresAtObj[key] = 0;
                expiresAtObj['__' + key] = 0;
            }
            expiresAtObj.days = 0;
            expiresAtObj.minutes = 0;
            expiresAtObj.seconds = 0;
            expiresAtObj.hours = 0;
            expiresAtObj.end()
        }
        expiresAtObj.__hoursTotalS2 = window._$numberHelpers.s2(expiresAtObj.__hoursTotal);
        expiresAtObj.__hours = window._$numberHelpers.s2(expiresAtObj.hours);
        expiresAtObj.__minutes = window._$numberHelpers.s2(expiresAtObj.minutes);
        expiresAtObj.__seconds = window._$numberHelpers.s2(expiresAtObj.seconds);
    },


    getExpiresAt(incomingUtcDate) {
        let expiresAt = this.getClearExpiresAt();
        let expiresAtMoment = new moment.utc(incomingUtcDate, 'YYYY-MM-DD HH:mm:ss');
        window._$dateFormatter.prepareMomentObj(expiresAtMoment);
        expiresAt.momentObj = expiresAtMoment;
        this.recalculateExpiresAtObj(expiresAt);
        return expiresAt;
    },

    getExpiresIn(msTimestamp) {
        let expiresAt = this.getClearExpiresAt();
        let expiresAtMoment = new moment(msTimestamp).utcOffset(0, true);
        window._$dateFormatter.prepareMomentObj(expiresAtMoment);
        expiresAt.momentObj = expiresAtMoment;
        this.recalculateExpiresAtObj(expiresAt);
        return expiresAt;
    },


    getClearExpiresAt(cfg) {
        cfg = cfg ? cfg : {};
        let d = reactive({
            days: 0,
            __hours: '00',
            __minutes: '00',
            __seconds: '00',
            __hoursTotalS2: '00',
            hours: 0,
            minutes: 0,
            seconds: 0,
            secondsTotal: 0,
            minutesTotal: 0,
            hoursTotal: 0,
            daysTotal: 0,
            __secondsTotal: 0,
            __minutesTotal: 0,
            __hoursTotal: 0,
            __daysTotal: 0,
            momentObj: null,
            isExpired: false,
            tm: null,
            endCallback: null,
            start: null,
            stop: null,
            end: null,
            methods: {
                start() {

                },
                end() {

                },
                stop() {

                }
            }

        });
        d.stop = () => {
            if (d.tm) {
                clearInterval(d.tm);
            }
        }
        d.end = () => {
            d.stop();
            if (typeof d.endCallback === 'function') {
                d.endCallback();
            }
        }
        d.start = () => {
            d.stop();
            d.tm = setInterval(() => {
                expiresAt.recalculateExpiresAtObj(d);
            }, 1000);
        }
        return d;
    },
}

export default expiresAt;