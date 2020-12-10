<template>
  <main>
     <div>
        <div>
            <label for="">글 제목</label>
            <input v-model="article.title" type="text">
        </div>
        <div>
            <label for="">내용</label>
            <input v-model="article.content" type="textarea">
        </div>
        <button v-on:click="update(article.id)" class="btn btn-success">수정</button> <button  class="btn btn-warning" v-on:click="back()">뒤로가기</button>
    </div>  
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
        axios.get('/articles/edit/'+this.$route.params.id)
        .then((res)=>{
            console.log(res.data,"아티클 에딧");
            this.article = res.data;
        })
        .catch((err)=>{
            console.log(err);
        })
    },
    methods:{
        update(id){
            axios.patch('/articles/update/'+id,{
                'title':this.article.title,
                'content':this.article.content,
            })
            .then((res)=>{
                console.log('수정성공',res.data);
                this.$router.push({ name:'articles_show', params : {id:id} });
                // this.article.title = res.data.title;
                // this.article.content = res.data.content;
            })
            .catch((err)=>{
                console.log('수정실패',err);
            })
        },
        back(){
            this.$router.go(-1);
        }
    }
}
</script>

<style>

</style>