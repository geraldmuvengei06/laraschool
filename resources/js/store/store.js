import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)




export const store = new Vuex.Store({
    
    state:  {
        app_name: '',
        user: {},
        username: '',
        roles: [],
    },

    // to notify the store that the state should change
    mutations: {
        change(state, app_name){
            state.app_name = app_name
        },

        user(state, user){
            state.user = user
        },

        username(state, username){
            state.username = username
        },

        roles(state, roles){
            state.roles = roles
            // console.log(roles);
            
        }
    },

    // way to look at the state
    getters: {
        app_name: state => state.app_name,
        user: state => state.user,
        username: state => state.username,
        roles: state => state.roles
    }

})

