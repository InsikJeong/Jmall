<template> 
	<main> 
        <Header-component></Header-component>
    	<router-view></router-view>
        <Footer-component></Footer-component>
    </main> 
</template>


<script>
import Header from '../components/Header.vue';
import axios from 'axios';
export default {
    name:'app',
    data(){
        return{
            user:{
                id:'',
                name:'',
                email:'',
            },
        }
    },
    mounted(){
        this.init();
    },
    methods:{
        init(){
            console.log('이닛');
            axios.get('/auth/init')
            .then((res)=>{
                if(res.data.user == null){
                    this.user.name="Guest";
                    localStorage.name = '';
                    localStorage.email = '';
                    localStorage.id = '';
                    this.$store.commit('notlogged');
                }
                else{        
                    this.user=res.data.user;
                    console.log('웰컴',this.user);
                    localStorage.id = this.user.id;
                    localStorage.name = this.user.name;
                    localStorage.email = this.user.email;
                    this.$store.commit('islogged');
                }
            })
        }
      
    }
}
</script>

<style>

</style>