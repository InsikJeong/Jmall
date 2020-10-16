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
            <button v-on:click="store">작성</button>
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
                user_id:localStorage.id,
            }
        }
    },
    created:function(){
        console.log(this.article);
    },
    methods:{
        store(){
            axios.post('/articles/store',{
                'title':this.article.title,
                'content':this.article.content,
                'user_id':this.article.user_id,
            }
            )
            .then((res)=>{
                console.log("글작성 성공",res);
                this.$router.push('/articles')
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