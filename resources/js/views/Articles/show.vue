<template>
  <main>
      <h1>{{article}}</h1>
  </main>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return{
            article:{

            }
        }
    },
    created:function(){
        // console.log(this.$router.params.id,"아이디");
        axios.get('/articles/show/'+this.$router.params.id)
        .then((res)=>{
            this.article = res.data;
        })
        .catch((err)=>{
            console.log(err);
        })
    },
    methods:{
        del(id){
            axios.delete('articles/delete/'+id)
            .then((res)=>{
                console.log('삭제성공');
                this.$router.push('/articles');
            })
            .catch((err)=>{
                console.log('삭제 실패');
            })
        },
        edit(id){

        }
    }
}
</script>

<style>

</style>