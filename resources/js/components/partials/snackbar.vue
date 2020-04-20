<template>
    <v-snackbar
        v-model="showSnackbar"
        :color="isSnackbarType"
        top
        >
        {{ isSnackbarMessage }}
        <v-btn text color="white" @click.native="snackBar = false">Close</v-btn>
    </v-snackbar>
</template>

<script>
export default {
    props: {
        message: {
            type: String,
            default: null,
        },
        
        type: {
            type: String,
            default: null
        },
    },

    data() {
        return {
            showSnackbar: null,
        }
    },

    
    computed: {
        isSnackbarMessage () {
            return this.message
        },
        isSnackbarType () {
            return this.type
        },

    },


    mounted() {
        Fire.$on('showSnackbar', () => {
            this.showSnackbar = true
        });
    }

}
</script>

<style>

</style>