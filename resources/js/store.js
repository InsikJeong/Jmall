import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state:{
        logged:false,
    },
    mutations:{
       islogged(state){
        console.log('스테이트',state);
        state.logged = true;
       },
       notlogged(state){
        console.log('스테이트',state);
        state.logged = false;
       } 
       
    },
    actions:{}
});
