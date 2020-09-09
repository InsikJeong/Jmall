import Vue from 'vue';
import Router from 'vue-router';
import Welcome from './views/Welcome.vue';
import Register from './views/Register.vue';
import Main from './views/Main.vue';
import Login from './views/Login.vue';
import Articles from './views/Articles.vue';

Vue.use(Router);

const routes = [
    {
        path:'/welcome',
        name:'welcome',
        component: Welcome
    },
    {
        path:'/',
        name:'main',
        component:Main
    },
    {
        path:'/articles',
        name:'articles',
        component:Articles
    },
    {
        path:'/login',
        name:'login',
        component:Login
    },
    {
        path:'/register',
        name:'register',
        component: Register
    },
    
];

const router = new Router({
    mode:'history',
    routes: routes
})

export default router;