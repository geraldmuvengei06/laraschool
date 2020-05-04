<template>
  <v-app 
  id="inspire"
  color="gray lighten-4">

    <drawer-component></drawer-component>

    <div class="is-background grey lighten-5 fill-height"
        fluid>
      <router-view/>
    </div>

  </v-app>
</template>

<script>

  import DrawerComponent  from "./partials/Drawer.vue";

  export default {
    components: {
      DrawerComponent
    },
    
    props: {
      source: String,
      user: {
        type: Object,
        default: null
      },
      appname: {
        type: String,
        default: null
      }
    },

    created() {
      this.$store.commit('change', this.appname)  
      this.$store.commit('user', this.user) 
      let username = this.user.first + ' ' + this.user.last
      this.$store.commit('username', username)
    },

    mounted() {
      this.$store.commit('roles')
      
      
    },
  }
</script>

