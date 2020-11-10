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
                id:'',
                name:'',
                email:'',
            },
        }
    },
    created:function(){
      axios.get('/auth/init')
      .then((res)=>{
          if(res.data.user == null){
              this.user.name="Guest";
            //   localStorage.name = '';
            //   localStorage.email = '';
            //   localStorage.id = '';
          }
          else{        
              this.user=res.data.user;
              console.log('웰컴',this.user);
            //   localStorage.id = this.user.id;
            //   localStorage.name = this.user.name;
            //   localStorage.email = this.user.email;
          }
      })
    },
    methods:{

    },

}
</script>

<style>

</style>