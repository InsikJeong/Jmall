<template>
    <div class="login_conteiner">
        <div>
            <label for="">아이디</label>
            <input v-model="user.email" type="text">
        </div>
        <div>
            <label for="">비밀번호</label>
            <input v-model="user.password" type="password">
        </div>
        <button v-on:click="login">로그인</button>
        <router-link to="/register">
            <span>회원가입</span>
        </router-link>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data(){
        return{
            user:{
                id:'',
                name:'',
                email:'',
                password:'',
            }
        }
    },
    methods:{
        login(){
            axios.post('auth/login',{
                'email':this.user.email,
                'password':this.user.password,
            }
            )
            .then((res)=>{
                console.log("성공",res.data);
                localStorage.id = this.user.id;
                localStorage.name = this.user.name;
                localStorage.email = this.user.email;
                this.$store.commit('islogged')
                this.$router.push('/')
            })
            .catch((err)=>{
                console.log('실패',err);
            })
        }
    }
}
</script>

<style>
    .login_conteiner{
        
    }
</style>