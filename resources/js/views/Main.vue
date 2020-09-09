<template>
	<main> 
        <div>

        </div>
    	<h3> Main page </h3> 
        <button class="btn btn-primary"> complete! </button>
    </main> 
</template>

<script>
export default {
    data(){
        return{
            user:'',
            loading:false,
        }
    },
    // mounted(){
    //     this.init();
    // },
    // methods:{
    //     init(){
    //         this.req.get('/auth/init').then(res=>{
    //             this.user = response.data.user;
    //         })
    //     }
    // }
}
</script>

<style>

</style>