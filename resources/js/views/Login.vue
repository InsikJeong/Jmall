<template>
    <main>
        <h1>Login</h1>
        <div class="login_conteiner">
            <div class="alert alert-danger" v-if="errors.length">
                <ul class="mb-0">
                    <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
                </ul>
            </div>
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
                <span class="btn_register">회원가입</span>
            </router-link>
        </div>
    </main>
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
            },
            errors:[]
        }
    },
    methods:{
        login(){
            this.errors = [];

            if (!this.user.email)
            {
                this.errors.push('이메일 입력이 필요합니다.');
            }

            if (!this.user.password)
            {
                this.errors.push('비밀번호 입력이 필요합니다.');
            }

            if(!this.errors.length){
                axios.post('auth/login',{
                    'email':this.user.email,
                    'password':this.user.password,
                }
                )
                .then((res)=>{
                    console.log("성공",res.data);
                    // localStorage.id = this.user.id;
                    // localStorage.name = this.user.name;
                    // localStorage.email = this.user.email;
                    this.$store.commit('islogged')
                    this.$router.push('/')
                })
                .catch((err)=>{
                    console.log('실패',err);
                    this.errors.push('아이디나 비밀번호가 틀립니다.')
                })
            }
        }
    }
}
</script>

<style>
    .login_conteiner{
        
    }
    .btn_register{
        color:black;
    }
</style>