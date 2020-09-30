import Vue from 'vue';
import Router from 'vue-router';
import Welcome from './views/Welcome.vue';
import Register from './views/Register.vue';
import Main from './views/Main.vue';
import Login from './views/Login.vue';
import Articles_index from './views/Articles/index.vue';
import Articles_create from './views/Articles/create.vue';
import Articles_show from './views/Articles/show.vue';

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
        component:Articles_index
    },
    {
        path:'/articles/show/:id',
        name:'articles_show',
        // props:true,
        component:Articles_show,
    },
    {
        path:'/articles/create',
        name:'articles_create',
        component:Articles_create
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