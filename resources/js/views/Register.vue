<template>
    <main>
        <h1>Register</h1>
        <div class="alert alert-danger" v-if="errors.length">
            <ul class="mb-0">
                <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
            </ul>
        </div>
        <div>
            <div>
                <label for="">이름</label>
                <input v-model="register.name" type="text">
            </div>
            <div>
                <label for="">이메일</label>
                <input v-model="register.email" type="text">
            </div>
            <div>
                <label for="">비밀번호</label>
                <input v-model="register.password" type="password">
            </div>
            <button v-on:click="auth">회원가입</button>
        </div>
    </main>
</template>

<script>
import axios from 'axios';

export default {
    data(){
        return{
            register:{
                name:"",
                email:'',
                password:'',
            },
            errors:[],
        }
    },
    methods:{
        auth(){
            this.errors=[];

            if(!this.register.name)
            {
                this.errors.push('이름을 입력해주세요.');
            }
            if(!this.register.email)
            {
                this.errors.push('이메일을 입력해주세요.');
            }
            if(!this.register.password)
            {
                this.errors.push('비밀번호를 입력해주세요.');
            }
            if(!this.errors.length)
            {
                axios.post('/auth/register',{
                    'name':this.register.name,
                    'email':this.register.email,
                    'password':this.register.password,
                })
                .then((res)=>{
                    console.log("성공",res);
                    this.$store.commit('islogged')
                    this.$router.push('/welcome');
                })
                .catch((err)=>{
                    console.log('실패');
                    this.errors.push('중복된 이메일입니다.')
                })
            }
        }
    }
}
</script>

<style>

</style>