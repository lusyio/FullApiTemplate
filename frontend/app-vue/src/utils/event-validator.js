window._$eventValidator = {
    validateIntegerInput: function ($event) {
        return $event.charCode >= 48 && $event.charCode <= 57;
    },
    validateFloatInput: function ($event) {
        return $event.charCode === 46 || ($event.charCode >= 48 && $event.charCode <= 57);
    }
};

export default window._$eventValidator;
