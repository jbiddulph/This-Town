<template>
    <div>
        xxx
        <form @submit="formSubmit">
            <button v-if="show" type="submit" class="btn btn-success" style="width: 100%;">Apply</button>xx
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                'show':true
            }
        }
    }
</script>
