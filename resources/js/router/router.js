import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Login from '../components/Auth/Login.vue'
import Register from '../components/Auth/Register.vue'
import HomeContent from '../components/HomeContent.vue'

import Profile from '../components/pages/Profile.vue'
import Dashboard from '../components/pages/Dashboard.vue'
import Settings from '../components/pages/Settings.vue'
import RolePermissions from '../components/pages/RolePermissions.vue'
import Users from "../components/pages/Users.vue";



let routes = [
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            title: 'Login',
            description: 'Login to laraschool',
        }
    },

    {
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            title: 'Register',
            description: 'Register to laraschool'
        }
    },

    {
        path: '/home',
        component: HomeContent,
        children: [
            {
                path: 'profile',
                name: 'profile',
                component: Profile,
                meta: {
                    title: 'Profile',
                    description: 'Laraschool Profile',
                }
            },
            {
                path: 'dashboard',
                name: 'dashboard',
                component: Dashboard,
                meta: {
                    title: 'Dashboard',
                    description: 'Laraschool dashboard',
                }
            },
            {
                path: 'settings',
                name: 'settings',
                component: Settings,
                meta: {
                    title: 'Settings',
                    description: 'Laraschool settings'
                }
            },
            {
                path: 'role-permissions',
                name: 'role_permissions',
                component: RolePermissions,
                meta: {
                    title: 'Role Permissions',
                    description: 'Laraschool role permissions'
                }
            },

            {
                path: 'users',
                name: 'users',
                component: Users,
                meta: {
                    title: 'Users',
                    description: 'Laraschool users'
                }
            },
        ]
    } 
]

export default new VueRouter({
    mode: 'history',
    routes: routes
});