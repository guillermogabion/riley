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
import moment from 'moment'
import App2 from './layouts/App2.vue' 


Vue.prototype.moment = moment
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


  
  