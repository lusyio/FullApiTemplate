const validators = {
    isValueBlank: function (v) {
        if (v === '') {
            return true;
        }
        if (('' + v).trim() === '') {
            return true;
        }
        if (v === null) {
            return true;
        }
        return false;
    },
    validatePhone: function (phone) {
        let mask = '+7 (###) ###-##-##';
        let res = {
            result: false,
            msg: ''
        };
        if (!phone) {
            res.msg = 'Введите номер телефона';
            return res;
        }
        let rphone = phone.toString().trim().split('');
        if (!rphone.length) {
            res.msg = 'Введите номер телефона';
            return res;
        }
        if (rphone.length !== mask.length) {
            res.msg = rphone.length + ' | ' + rphone.join() + 'Введите полный номер телефона<br/> в формате ' + mask;
            return res;
        }
        for (let i = 0; i < rphone.length; i++) {
            let letter = rphone[i];
            let maskLetter = mask[i];
            if (maskLetter === '#') {
                if (isNaN(letter)) {
                    res.msg = 'Введите корректный номер телефона';
                    return res;
                }
            } else {
                if (letter !== maskLetter) {
                    res.msg = 'Введите корректный номер телефона';
                    return res;
                }
            }
        }
        res.result = true;
        return res;
    }

};


window._$validators = validators;

export default validators;
