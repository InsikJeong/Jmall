<template>
    <div>
        <label for="">아이디</label>
        <input v-model="user.email" type="text">
        <label for="">비밀번호</label>
        <input v-model="user.password" type="password">
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
            // ,{
            // headers: {
            //   'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
            //   'Accept' : 'application/json'
            // }}
            )
            .then((res)=>{
                console.log("성공",res);
                this.$router.push('/welcome')
            })
            .catch((err)=>{
                console.log('실패');
            })
        }
    }
}
</script>

<style>

</style>