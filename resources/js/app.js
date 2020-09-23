
window.Vue = require('vue');

// import BootstrapVue from 'bootstrap-vue' 
import axios from 'axios' 
import VueAxios from 'vue-axios'
import VueMask from 'v-mask' 
import Vue from "vue";
import Vuex from "vuex";
import VNus from "vue-nouislider-fork"; 
Vue.use(VNus);


 
Vue.component('menu-component', require('./components/menu.vue').default);
Vue.component('header-component', require('./components/header.vue').default);
Vue.component('footer-component', require('./components/footer.vue').default);
Vue.component('search-component', require('./components/search.vue').default);
Vue.component('whats-component', require('./components/whats.vue').default);
Vue.component('anuncio-component', require('./components/anuncio.vue').default);
Vue.component('acheiimo-component', require('./components/acheimo.vue').default);
Vue.component('wpp-component', require('./components/whatsicon.vue').default);
Vue.component('destaques-component', require('./components/destaqueshome.vue').default);

const app = new Vue({
    el: '#app',
});

Vue.use(VueMask)

// Vue.use(BootstrapVue) 

Vue.use(VueAxios, axios)
Vue.use(Vuex)
Vue.prototype.$http = axios


// export default new Vuex.Store({
//     State:{

//     }
// })