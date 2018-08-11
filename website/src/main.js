// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import axios from 'axios'
import App from './App'
import router from './router'
import vueWaterfallEasy from 'vue-waterfall-easy'

Vue.config.productionTip = false
Vue.prototype.$ajax = axios
Vue.use(BootstrapVue);
/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App ,vueWaterfallEasy },
  template: '<App/>'
})
