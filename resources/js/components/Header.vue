<template>
    <ul>
        <li>
            <router-link to="/articles">
            <span>Articles</span>
            </router-link>
        </li>
        <li>
            <router-link to="/welcome">
            <span>Welcome</span>
            </router-link>
        </li>
        <li>
            <router-link to="/login">
            <span>login</span>
            </router-link>
        </li>
        <li>
            <router-link to="/register">
            <span>register</span>
            </router-link>
        </li>
        <li>
            <span v-on:click="logout()">logout</span>
        </li>
    </ul>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return{
            
        }
    },
    methods:{
        logout()
        {
            axios.post('/auth/logout')
            .then((res)=>{
                console.log("로그아웃 성공",res);
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