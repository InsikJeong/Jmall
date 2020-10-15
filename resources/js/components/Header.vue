<template>
    <main>
        <nav class="header">
            <ul>
                <li class="nav_logo">
                    <router-link to="/welcome">
                    <span>J Mall</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/articles">
                    <span>Articles</span>
                    </router-link>
                </li>
                <li v-if="this.$store.state.logged" class="nav_logged">
                    <span v-on:click="logout()">logout</span>
                </li>
                <li v-else class="nav_logged">
                    <router-link to="/login">
                    <span>login</span>
                    </router-link>
            
                    <router-link to="/register">
                    <span>register</span>
                    </router-link>
                </li>
            </ul>

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
    ul>li{
        display: inline;
        font-size: 20px;
        margin-right: 10px;
    }
    .nav_logged{
        margin-left: 60%;
    }
    .header{
        background:#5eaeff;
        text-align: center;
        color: white;
        width: 100%;
    }
    span{
        color: white;
    }
    .nav_logo{
        color: beige;
        font-size: 50px;
        margin-right: 40px;
    }
</style>