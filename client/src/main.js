import Vue from 'vue'
import App from './App.vue'
import 'vue-googlemaps/dist/vue-googlemaps.css'
import VueGoogleMaps from 'vue-googlemaps'
import axios from 'axios'
import Toasted from 'vue-toasted';
import store from './store'
import moment from 'moment'

Vue.prototype.ucFirst = (s) => s.charAt(0).toUpperCase() + s.slice(1);
Vue.prototype.moment = moment
Vue.prototype.$http = axios;
axios.defaults.baseURL = process.env.VUE_APP_API_URL;

Vue.use(Toasted);
Vue.use(VueGoogleMaps, {
  load: {
    apiKey: "AIzaSyDjLYLdmII4_R43KVv10UWJfv0kSCMKE_g",
    libraries: ['places'],
    useBetaRenderer: false,
  }
});

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  store
}).$mount('#app')
