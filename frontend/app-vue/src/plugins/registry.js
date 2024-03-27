
import moment from 'moment';
window._$moment = moment;

import objectStructureFormatter from '../utils/object-structure-formatter';


import vBtn from './../components/elements/v-btn.vue';
import loginScreen from './../components/screens/auth/login-screen.vue';

export default function (app) {
    app.component('v-btn', vBtn);
    app.component('login-screen', loginScreen);
}
