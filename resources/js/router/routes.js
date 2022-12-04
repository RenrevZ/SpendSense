import { createRouter,createWebHistory } from "vue-router";
import Login from '../view/Auth/Login.vue';
import Signup from '../view/Auth/Signup.vue'
import Welcome from '../view/Setup/welcome.vue'

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
            path:'/welcome',
            name:'welcome',
            component:Welcome
        },
    ]
});

export default router
