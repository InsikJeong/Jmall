<template>
  <main>
    <h3>제목 : {{article.title}}</h3>
    <p>내용 : {{article.content}}</p>
    <div v-if="article.user_id == user.id">
        <button v-on:click="edit(article.id)">수정</button> <button v-on:click="del(article.id)">삭제</button> <button v-on:click="back()">뒤로가기</button>
    </div>
    <div v-else-if="user.id == 1">
        <button v-on:click="edit(article.id)">수정</button> <button v-on:click="del(article.id)">삭제</button> <button v-on:click="back()">뒤로가기</button>
    </div>
    <div v-else>
        <button v-on:click="back()">뒤로가기</button>
    </div>
    <hr>
    <div class="title">
        <h4 for="" class="comments_content">Comment</h4>
    </div>
    <div v-for="(value,index) in comments" :key="index">
        <div v-if="user.id == value.user_id">
            <label class="comment_text">{{value.content}}</label> <label>{{value.user_name}}</label> <button v-on:click="comments_del(value.id)">삭제</button>
        </div>
        <div v-else-if="user.id == 1">
            <label class="comment_text">{{value.content}}</label> <label>{{value.user_name}}</label> <button v-on:click="comments_del(value.id)">삭제</button>
        </div>
        <div v-else>
            <label class="comment_text">{{value.content}}</label> <label>{{value.user_name}}</label>
        </div>
    </div>
    <hr>
    <br>
    <div>
        <label for="">내용</label>
        <input v-model="comment.content" type="textarea" class="comment_text">
        <button v-on:click="comment11()">작성</button> 
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
            },
            article:{
                title:'',
                content:'',
                user_id:'',
            },
            comment:{ //작성 댓글
                content:'',
                article_id:this.$route.params.id,
            },
            comments:{ //이게 띄울 댓글
                
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

        axios.get('/auth/init')
            .then((res)=>{
                console.log('유저 정보',res.data.user);
                if(res.data.user == null){
                    this.user.name="Guest";
                    this.$store.commit('notlogged');
                }
                else{        
                    this.user=res.data.user;
                    console.log('웰컴',this.user);
                    this.$store.commit('islogged');
                }
            })

        this.comments_get(this.$route.params.id);
    },
    methods:{
        comments_get(id){
            axios.get('/articles/comments_index/'+id)
            .then((res)=>{
                console.log(res.data)
                this.comments = res.data;
            })
            .catch((err)=>{
                console.log(err);
            })
        },
        comment11(){
            axios.post('/articles/comments',{
                    'content':this.comment.content,
                    'user_id':this.user.id,
                    'user_name':this.user.name,
                    'article_id':this.comment.article_id,
                }
                )
                .then((res)=>{
                    console.log("댓글작성 성공",res.data);
                    this.comment.content = "";
                    this.comments_get(this.$route.params.id);
                })
                .catch((err)=>{
                    console.log('댓글 실패');
                })
        },
        comments_del(id){
             axios.delete('/articles/comments_delete/'+id)
            .then((res)=>{
                console.log('삭제성공');
                this.comments_get(this.$route.params.id);
            })
            .catch((err)=>{
                console.log('삭제 실패');
            })
        },
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
        ,
        back(){
            this.$router.go(-1);
        }
    }
}
</script>

<style>
    .comment_text,.comments_content{
        width: 500px;
    }
</style>