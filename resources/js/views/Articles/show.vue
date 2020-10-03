<template>
  <main>
    <h3>제목 : {{article.title}}</h3>
    <p>내용 : {{article.content}}</p>
    <button v-on:click="edit(article.id)">수정</button> <button v-on:click="del(article.id)">삭제</button>
  </main>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return{
            article:{
                title:'',
                content:'',
            }
        }
    },
    created:function(){
        // console.log(this.$router.params.id,"아이디");
        axios.get('/articles/show/'+this.$route.params.id)
        .then((res)=>{
            console.log(res.data,"아티클 쇼");
            this.article = res.data;
        })
        .catch((err)=>{
            console.log(err);
        })
    },
    methods:{
        del(id){
            axios.delete('/articles/delete/'+id)
            .then((res)=>{
                console.log('삭제성공');
                this.$router.push('/articles');
            })
            .catch((err)=>{
                console.log('삭제 실패');
            })
        },
        edit(id){
            axios.get('/articles/edit/'+id)
            .then((res)=>{
                this.$router.push('/articles/edit/'+id);
            })
            .catch((err)=>{
                console.log('에딧실패',err);
            })
        }
    }
}
</script>

<style>

</style>