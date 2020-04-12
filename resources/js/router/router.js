import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Login from '../components/Auth/Login.vue'
import HomeContent from '../components/HomeContent.vue'

import Dashboard from '../components/pages/Dashboard.vue'
import Settings from '../components/pages/Settings.vue'
import RolePermissions from '../components/pages/RolePermissions.vue'



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
        path: '/home',
        component: HomeContent,
        children: [
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
            }
        ]
    } 
]

export default new VueRouter({
    mode: 'history',
    routes: routes
});