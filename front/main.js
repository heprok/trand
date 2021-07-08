// =========================================================
// * Vuetify Material Dashboard - v2.1.0
// =========================================================
//
// * Product Page: https://www.creative-tim.com/product/vuetify-material-dashboard
// * Copyright 2019 Creative Tim (https://www.creative-tim.com)
//
// * Coded by Creative Tim
//
// =========================================================
//
// * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import './plugins/base'
import './plugins/vee-validate'
import './plugins/global'
import vuetify from './plugins/vuetify'
import i18n from './i18n'
import Snotify, { SnotifyPosition } from 'vue-snotify'
import moment from 'moment-timezone'
import Chart from 'chart.js'
import LoaderTlc from "tlc-front-components/src/LoaderTlc";

Chart.defaults.global.defaultFontSize = 20;

const optionsNotification = {
  toast: {
    position: SnotifyPosition.rightTop
  }
}
moment.tz.setDefault(store.state.timezone)

Vue.use(Snotify, optionsNotification);

Vue.prototype.$moment = moment
Vue.config.productionTip = false
Vue.component('LoaderTlc', LoaderTlc);
new Vue({
  router,
  Snotify,
  store,
  moment,
  vuetify,
  i18n,
  render: h => h(App),
}).$mount('#app')