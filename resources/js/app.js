require('./bootstrap');

window.Vue = require('vue').default;

import vuetify from './plugins/vuetify'
import router from './plugins/router';
import App from './layouts/App.vue';
import general from './mixins/general.vue'
import VueApexCharts from 'vue-apexcharts'
import store from './store';
import Vue from 'vue';
import VueChart from 'vue-chart-js'


Vue.use(VueApexCharts)
Vue.mixin(general)
Vue.use(VueChart)
Vue.component('apexchart', VueApexCharts)
const app = new Vue({
    router,
    vuetify,
    store,
    el: '#app',
    render: h => h(App),
});