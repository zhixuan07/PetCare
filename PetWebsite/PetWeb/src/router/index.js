import {createRouter, createWebHistory} from 'vue-router';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'Home',
            component: () => import('../users/views/Home.vue'),
        },
        {
            path: '/login',
            name: 'Login',
            component: () => import('../users/views/Login.vue'),
        },
        {
            path: '/register',
            name: 'Register',
            component: () => import('../users/views/Register.vue'),
        },
    ],
});

export default router;