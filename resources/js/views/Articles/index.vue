<template>
    <main>
        <div>
            <h1>Articles</h1>
        </div>
        <div class="title">
            <label for="">글 제목</label> <label for="">작성자</label>
        </div>
        <div v-for="(value,index) in articles" :key="index">
            <label v-on:click="show(value.id)">{{value.title}} {{value.user_name}}</label>
        </div>
        <div>
            <button  v-on:click="create">글 작성</button>
        </div>
    </main>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return{
            articles:{
                title:'',
                content:'',
                user_name:'',
            }
        }
    },
    created:function(){
        axios.get('articles/index')
        .then((res)=>{
            console.log(res.data)
            this.articles = res.data;
        })
        .catch((err)=>{
            console.log(err);
        })
    },
    methods:{
        create(){
            this.$router.push('/articles/create');
        },
        show(id){
            // this.$router.push('/articles/show/'+id);
            this.$router.push({ name:'articles_show', params : {id:id} });
        },
    }
}
</script>

<style>
    /* .title{
        border: 1px black solid;
    } */
    .title>label{
        border: 1px black solid;
    }
</style>