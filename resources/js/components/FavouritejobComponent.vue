<template>
    <div>

            <button v-if="show" @click.prevent="unsavejob()" type="submit" class="btn btn-primary"
                    style="width: 100%;">Unsave</button>
            <button v-else="show" @click.prevent="savejob()" type="submit" class="btn btn-success"
                style="width: 100%;">Save</button>

    </div>
</template>

<script>
    export default {
        props:['jobid','favorited'],

        data(){
            return{
                'show':true
            }
        },

        mounted(){
            this.show = this.jobFavorited ? true:false;
        },

        computed:{
            jobFavorited(){
                return this.favorited
            }
        },

        methods: {
            savejob(){
                axios.post('/savejob/'+this.jobid).then(response=>
                    this.show=true).catch(error=>alert('error'))
            },
            unsavejob(){
                axios.post('/unsavejob/'+this.jobid).then(response=>
                    this.show=false).catch(error=>alert('error'))
            }
        }
    }
</script>
