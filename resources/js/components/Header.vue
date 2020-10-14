<template>
    <main>
        <nav>
            <router-link to="/articles">
            <span>Articles</span>
            </router-link>
            <div v-if="this.$store.state.logged">
                <span v-on:click="logout()">logout</span>
            </div>
            <div v-else>
                <router-link to="/login">
                <span>login</span>
                </router-link>
        
                <router-link to="/register">
                <span>register</span>
                </router-link>
            </div>
        </nav>
    </main>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return{
        }
    },
    created:function(){
        // console.log(this.user,'유저');
        // console.log(this.userId,'유저id');
    },
    methods:{
        logout()
        {
            axios.post('/auth/logout')
            .then((res)=>{
                console.log("로그아웃 성공",res);
                localStorage.name = '';
                localStorage.email = '';
                localStorage.id = -1;
                localStorage.userToken = '';
                this.userId = localStorage.id;
                this.$store.commit('notlogged');

                console.log(this.userId,'유저아디');
                this.$router.push('/login');
                // this.$router.go(this.$router.currentRoute);
            })
            .catch((err)=>{
                console.log('실패',err);
            })
        },
    }
}
</script>

<style>

</style>