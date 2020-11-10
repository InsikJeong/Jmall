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
    data(){
        return{
            user:{
                id:'',
                name:'',
                email:'',
            },
        }
    },
    created(){
        this.init();
    },
    methods:{
        init(){
            console.log('이닛');
            axios.get('/auth/init')
            .then((res)=>{
                console.log('유저 정보',res.data.user);
                if(res.data.user == null){
                    this.user.name="Guest";
                    this.$store.commit('notlogged');
                }
                else{        
                    this.user=res.data.user;
                    console.log('웰컴',this.user);
                    this.$store.commit('islogged');
                }
            })
        }
      
    }
}
</script>

<style>

</style>