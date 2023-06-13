import { createRouter,createWebHistory } from "vue-router";
import Login from '../view/Auth/Login.vue';
import Signup from '../view/Auth/Signup.vue'


const router = createRouter({
    history:createWebHistory(),
    routes:[
        {
            path:'/',
            name:'login',
            component:Login
        },
        {
            path:'/signup',
            name:'signup',
            component:Signup
        },
        {
            path:'/Dashboard',
            name:'Dashboard',
            component: () => import('../view/Setup/Dashboard.vue')
        },
        {
            path:'/CashRegistry',
            name:'CashRegistry',
            component: () => import('../view/Setup/CashRegistry.vue')
        },
    ]
});

export default router
