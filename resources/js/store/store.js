import Vue from 'vue'
import Vuex from 'vuex'
import Axios from 'axios'
import VueAxios from 'axios'

Vue.use(Vuex)
Vue.use({ Axios, VueAxios })


export const store = new Vuex.Store({
    
    state:  {
        app_name: '',
        user: {},
        username: '',
        roles: [],
        permissions: [],
    },

    // to notify the store that the state should change
    mutations: {
        change(state, app_name){
            state.app_name = app_name
        },

        user(state, user){
            state.user = user
        },

        roles(state){
            axios.get('/user-roles-permissions').then((res) => {
                state.roles = res.data.roles
                state.permissions = res.data.permissions                
            })
        },        

        username(state, username){
            state.username = username
        },

       
    },

    // way to look at the state
    getters: {
        app_name: state => state.app_name,
        user: state => state.user,
        username: state => state.username,
        roles: state => state.roles,
        permissions: state => state.permissions
    }

})

