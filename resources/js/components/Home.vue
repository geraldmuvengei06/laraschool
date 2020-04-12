<template>
  <v-app id="inspire">
   

    <v-app-bar
      app
      clipped-right
      light
      color="white"
      dense
    >
      <v-app-bar-nav-icon @click.stop="toggleMinivariant"/>
      <v-toolbar-title>{{ appname }}</v-toolbar-title>
      <v-spacer />
      <v-app-bar-nav-icon  @click.stop="right = !right" />
    </v-app-bar>

    <v-navigation-drawer
      v-model="drawer"
      app
      color="accent"
      dark
      :expand-on-hover="expandOnHover"
      :mini-variant="miniVariant"
    >
   
      <v-list dense>

        <v-list-item class="is-avatar-item" color="accent darken1">
          <v-list-item-avatar>
            <v-avatar
            :size=" miniVariant ? 34 : 44 "
            >
              <img :src="profile" alt="alt">
            </v-avatar>
          </v-list-item-avatar>
          <v-list-item-content class="is-avatar-content">
            <v-list-item-title class="is-avatar-username">{{ username }}</v-list-item-title>
            <v-list-item-subtitle link>{{ user.roles }}</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>

        <v-divider></v-divider>
        
        

        <v-list-item
        link
        :to="{ name: 'dashboard' }">
          <v-list-item-action>
            <v-icon >dashboard</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Dashboard</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-group
        prepend-icon="account_circle"
      >
        <template v-slot:activator>
          <v-list-item-title>Users</v-list-item-title>
        </template>

        <v-list-group
          no-action
          sub-group
        >
          <template v-slot:activator>
            <v-list-item-content>
              <v-list-item-title>Admin</v-list-item-title>
            </v-list-item-content>
          </template>

          <v-list-item
            v-for="(admin, i) in admins"
            :key="i"
            link
            :to="{ name: admin[1] }"
          >
            <v-list-item-title v-text="admin[0]"></v-list-item-title>
            <v-list-item-icon>
              <v-icon v-text="admin[1]"></v-icon>
            </v-list-item-icon>
          </v-list-item>
        </v-list-group>

        <v-list-group
          sub-group
          no-action
        >
          <template v-slot:activator>
            <v-list-item-content>
              <v-list-item-title>Actions</v-list-item-title>
            </v-list-item-content>
          </template>
          <v-list-item
            v-for="(crud, i) in cruds"
            :key="i"
            link
          >
            <v-list-item-title v-text="crud[0]"></v-list-item-title>
            <v-list-item-action>
              <v-icon v-text="crud[1]"></v-icon>
            </v-list-item-action>
          </v-list-item>
        </v-list-group>
      </v-list-group>

      <v-divider></v-divider>

      <!-- <v-spacer></v-spacer> -->
      
     
      </v-list>

      <template v-slot:append>
        <v-list dense>
           <v-list-item  @click="doLogout">
            <v-list-item-action>
              <v-icon color="blue-grey darken-1">lock</v-icon>
            </v-list-item-action>
            <v-list-item-content class="blue-grey--text darken-1">
              <v-list-item-title >Logout</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </template>
    </v-navigation-drawer>

   
    <router-view></router-view>

    <v-navigation-drawer
      v-model="right"
      fixed
      right
      temporary
    />

    
  </v-app>
</template>

<script>

  import profile from '../assets/images/profile.png';

  export default {
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

    computed: {
      
      username () {
        return this.user.first + " " + this.user.last
      }
    },
    data: () => ({
      drawer: null,
      drawerRight: null,
      right: false,
      miniVariant: false,
      expandOnHover: false,

      profile: profile,
      
      admins: [
        ['Management', 'role_permissions'],
        ['Settings', 'settings'],
      ],
      cruds: [
        ['Create', 'add'],
        ['Read', 'insert_drive_file'],
        ['Update', 'update'],
        ['Delete', 'delete'],
      ],
    }),

    methods: {
      toggleMinivariant(){        
        this.miniVariant = !this.miniVariant
        this.expandOnHover = !this.expandOnHover
      },

      doLogout() {
        axios.post('/logout').then((res) => {
          console.log(res)
          document.location.href = '/login'
        }).catch((err) => {
          console.log(err);
        })
      }
    },

    mounted() {            
    },
  }
</script>


<style lang="scss" scoped>

  // .is-avatar-tile{
  //   height: 60px;
  //   display: flex;
  //   align-items: center;
  //   justify-content: center;
  //   padding-top: 10px;
  //   padding-bottom: 10px;
  //   padding-right: 10px;
  //   flex-direction: column;
  // }
  .is-avatar-item{
    padding: 0 8px;
  }
  .is-avatar-username {
      text-transform: uppercase !important;
  }

 
  .v-list-item--active.v-list-item.v-list-item--link{
      .v-list-item__title, .v-icon{
          color: #2196f3;
      } 
  }

  
</style>