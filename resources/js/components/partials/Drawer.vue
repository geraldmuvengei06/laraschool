<template>
  <div>
    <v-app-bar
      app
      clipped-right
      light
      color="white "
      dense
      flat
    >
      <v-app-bar-nav-icon @click.stop="toggleMinivariant"/>
      <v-toolbar-title>{{ $store.getters.app_name }}</v-toolbar-title>
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

        <v-list-item  class="is-avatar-item" color="accent darken1">
          <v-list-item-avatar>
            <v-avatar
            :size=" miniVariant ? 34 : 44 "
            >
              <img :src="profile" alt="alt">
            </v-avatar>
          </v-list-item-avatar>
          <v-list-item-content class="is-avatar-content">
            <v-list-item-title class="is-avatar-username">{{  $store.getters.username }}</v-list-item-title>
            <v-list-item-subtitle class="is-capitalized" link v-for="(role, index) in $store.getters.roles" :key="index">{{ role.name }}</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>

        <v-divider></v-divider>
        
        <v-list-item
        v-for="(item, index) in menuUpper" :key="index"
        link
        :to="{ name: item[0] }">
          <v-list-item-action>
            <v-icon >{{ item[1] }}</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>{{ item[2] }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

       

        <v-list-group
        prepend-icon="account_circle"
        >
        <template v-slot:activator>
          <v-list-item-title>User Management</v-list-item-title>
        </template>

          <v-list-item
            v-for="(admin, i) in admins"
            :key="i"
            link
            :to="{ name: admin[1] }"
          >
            <v-list-item-title v-text="admin[0]"></v-list-item-title>
            <v-list-item-icon>
              <v-icon v-text="admin[2]"></v-icon>
            </v-list-item-icon>
          </v-list-item>

        
      </v-list-group>
      

      <v-divider></v-divider>

  
      
     
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

    <v-navigation-drawer
      v-model="right"
      fixed
      right
      temporary
    />
  </div>
</template>

<script>

import profile from '../../assets/images/profile.png';

export default {
    data() {
      return {
        drawer: null,
        miniVariant: false,
        expandOnHover: false,
        drawerRight: null,
        right: false,

        profile: profile,

        menuUpper: [
          ['profile', 'person', 'Profile'],
          ['dashboard', 'dashboard', 'Dashboard'],
        ],
  
        admins: [
            ['Roles', 'role_permissions', 'lock'],
            ['Users', 'users', 'person'],
            ['Settings', 'settings', 'settings'],
        ],
      }
    },


    methods: {
      toggleMinivariant(){        
        this.miniVariant = !this.miniVariant
        this.expandOnHover = !this.expandOnHover
        if (!this.drawer) {
          this.drawer = true
        }
      },

      doLogout() {
        axios.post('/logout').then((res) => {
          console.log(res)
          document.location.href = '/login'
        }).catch((err) => {
          console.log(err);
        })
      }

    }
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
  .v-list-item--active.v-list-item.v-list-item--link.theme--dark{
    color: white;
  }

</style>