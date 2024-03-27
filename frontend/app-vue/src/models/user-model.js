import Model from './model';

const fields = {
    id: 0,
    email: "",
    balance_value: 0,
}

class UserModel extends Model {

    constructor(user) {
        super();
        this.setupModel({
            fields: fields,
            instance: user
        });
    }
}

export default UserModel;
