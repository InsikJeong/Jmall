<template>
    <main>
        <div class="alert alert-danger" v-if="errors.length">
            <ul class="mb-0">
                <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
            </ul>
        </div>
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
                user_name:localStorage.name,
            },
            errors:[]
        }
    },
    created:function(){
        console.log(this.article);
    },
    methods:{
        store(){
            this.errors=[];

            if(!this.article.title)
            {
                this.errors.push('제목을 입력해주세요.');
            }
            if(!this.article.content)
            {
                this.errors.push('글 내용을 입력해주세요.');
            }
            if(!this.errors.length){
                axios.post('/articles/store',{
                    'title':this.article.title,
                    'content':this.article.content,
                    'user_id':this.article.user_id,
                    'user_name':this.article.user_name,
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
}
</script>

<style>

</style>