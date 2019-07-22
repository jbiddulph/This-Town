<template>
    <div>

        <button v-if="show" @click.prevent="unsaveevent()" type="submit" class="btn btn-primary"
                style="width: 100%;">Unsave</button>
        <button v-else="show" @click.prevent="saveevent()" type="submit" class="btn btn-success"
                style="width: 100%;">Save</button>

    </div>
</template>

    <script>
        export default {
            props:['eventid','favorited'],

            data(){
                return{
                    'show':true
                }
            },

            mounted(){
              this.show = this.eventFavorited ? true:false;
            },

            computed:{
                eventFavorited(){
                    return this.favorited
                }
            },

            methods: {
                saveevent(){
                    axios.post('/saveevent/'+this.eventid).then(response=>
                        this.show=true).catch(error=>alert('error'))
                },
                unsaveevent(){
                    axios.post('/unsaveevent/'+this.eventid).then(response=>
                        this.show=false).catch(error=>alert('error'))
                }
            }
        }
    </script>
