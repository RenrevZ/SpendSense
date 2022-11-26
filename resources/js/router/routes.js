import { createRouter,createWebHistory } from "vue-router";
import Login from '../view/Auth/Login.vue';
import Signup from '../view/Auth/Signup.vue'

const router = createRouter({
    history:createWebHistory(),
    routes:[
        {
            path:'/login',
            name:'login',
            component:Login
        },
        {
            path:'/signup',
            name:'signup',
            component:Signup
        },
    ]
});

export default router
