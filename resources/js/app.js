import Vue from 'vue';
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
import Main from './views/Main.vue';
import Home from './views/Home.vue';
import router from './router';
import 'bootstrap/dist/css/bootstrap.css'; 
import 'bootstrap';

Vue.component('Header-component',Header);
Vue.component('Footer-component',Footer);

new Vue({
    el: '#app', 
    router,
    render: h => h(Home) 
});