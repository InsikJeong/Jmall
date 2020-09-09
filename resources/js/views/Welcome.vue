<template>
    <div>
        <h1>
            Welcome {{user.name}}!!
        </h1>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return{
            user:{
                name:'',
                email:'',
                password:'',
            },
        }
    },
    created:function(){
      axios.get('/auth/init')
      .then((res)=>{
          if(res.data.user == null){
              this.user.name="Guest";
          }
          else{        
              this.user=res.data.user;
              console.log('웰컴',this.user);
          }
      })
    },
    methods:{

    }
}
</script>

<style>

</style>