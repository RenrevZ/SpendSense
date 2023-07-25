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
            component: () => import('../view/CashRegistry/CashRegistry.vue')
        },
        {
            path:'/CashRegistry/show/:id',
            name:'CashRegistryShow',
            component: () => import('../view/CashRegistry/Show.vue')
        },
        {
            path:'/CashRegistryForm',
            name:'CashRegistryForm',
            component: () => import('../view/components/CashRegistryForm.vue')
        },
        {
            path:'/ExpenseType',
            name:'ExpenseType',
            component: () => import('../view/ExpenseType/index.vue')
        },
        {
            path:'/Reports',
            name:'Reports',
            component: () => import('../view/Report/index.vue')
        },
    ]
});

export default router
