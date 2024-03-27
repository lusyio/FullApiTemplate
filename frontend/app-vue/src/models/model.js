class Model {



    static handleField(source, target, key, noUnlink) {
        if(typeof source[key] === 'object' && !noUnlink) {
            if(source[key]) {
                target[key] = JSON.parse(JSON.stringify(source[key]));
            } else {
                target[key] = source[key];
            }
        } else {
            target[key] = source[key];
        }
    }
    setupModel(opts) {
        let ignoredFields = opts.ignoredFields ? opts.ignoredFields : {};
        opts.instance = opts.instance ? opts.instance : {};
        for(let prop in opts.fields) {
            if(typeof opts.instance[prop] === 'undefined' || ignoredFields[prop]) {
                Model.handleField(opts.fields, this, prop);
            } else {
                Model.handleField(opts.instance, this, prop, opts.noUnlink);
            }

        }
    }

    setupDates(rawKeys, readableDateKeys) {

    }
    static getSkeletonList(count) {
        if (typeof this.getSkeletonItem !== 'function') { return []; }

        const skItem = this.getSkeletonItem();
        const skList = [];

        for (let i = 0; i < count; i++) {
            skList.push(skItem)
        }

        return skList;
    }

    static getModelKey(isLoading) {
        return isLoading ? 'skeleton' : 'real';
    }
}

export default Model;
