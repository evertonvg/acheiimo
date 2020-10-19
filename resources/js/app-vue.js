
window.Vue = require('vue');

import VueMask from 'v-mask' 
import Vue from "vue";
import VNus from "vue-nouislider-fork"; 
Vue.use(VNus);
Vue.use(VueMask)

 
Vue.component('menu-component', require('./components/menu.vue').default);
Vue.component('header-component', require('./components/header.vue').default);
Vue.component('footer-component', require('./components/footer.vue').default);
Vue.component('search-component', require('./components/search.vue').default);
Vue.component('whats-component', require('./components/whats.vue').default);
Vue.component('searchbutton-component', require('./components/searchbutton.vue').default);
Vue.component('anuncio-component', require('./components/anuncio.vue').default);
Vue.component('acheiimo-component', require('./components/acheimo.vue').default);
Vue.component('wpp-component', require('./components/whatsicon.vue').default);
Vue.component('destaques-component', require('./components/destaqueshome.vue').default);
Vue.component('contato-component', require('./components/contato.vue').default);
Vue.component('resultados-component', require('./components/resultados.vue').default);


const app = new Vue({
    el: '#app',
});



