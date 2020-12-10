<template>
    <main>
        <div>
            <h1>Articles</h1>
        </div>
        <div class="title">
            <label for="" class="article_title">글 제목</label> <label for="">작성자</label>
            <hr>
        </div>
        <div v-for="(value,index) in articles" :key="index">
            <label class="article_title" v-on:click="show(value.id)">{{value.title}}</label> <label>{{value.user_name}}</label>
        </div>
        <nav>
            <pagination
                :data="page"
                @pagination-change-page="fetchPosts"
            />
        </nav>
        <hr>
        <div>
            <button  v-on:click="create" class="btn btn-primary">글 작성</button>
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
            },
            page:{}
        }
    },
    created:function(){
        this.fetchPosts(1);
        // axios.get('articles/index')
        // .then((res)=>{
        //     console.log(res.data)
        //     this.articles = res.data.data;
        //     this.page = res.data;
        // })
        // .catch((err)=>{
        //     console.log(err);
        // })
    },
    methods:{
        create(){
            this.$router.push('/articles/create');
        },
        show(id){
            // this.$router.push('/articles/show/'+id);
            this.$router.push({ name:'articles_show', params : {id:id} });
        },
        fetchPosts(page) {
            axios.get('articles/index', {
                params: {
                page: page || 1,
                },
            })
            .then((res)=>{
                this.articles = res.data.data;
                this.page = res.data;
            });
      }
    }
}
</script>

<style>
    /* .title{
        border: 1px black solid;
    } */
    /* .title>label{
        border: 1px black solid;
    } */
    .article_title{
        width: 800px;
    }
</style>