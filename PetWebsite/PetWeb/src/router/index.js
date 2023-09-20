import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/",
            name: "Home",
            component: () => import("../users/views/Home.vue"),
        },
        {
            path: "/login",
            name: "Login",
            component: () => import("../users/views/Login.vue"),
        },
        {
            path: "/register",
            name: "Register",
            component: () => import("../users/views/Register.vue"),
        },

        {
            path: "/auth",
            redirect: "/adminLogin",
            name: "auth",
            component: () => import("../admin/components/AuthLayout.vue"),
            meta: { isGuest: true },
            children: [
                {
                    path: "/adminLogin",
                    name: "AdminLogin",
                    component: () => import("../admin/views/Login.vue"),
                },
            ],
        },
        {
            path: "/admin",
            redirect: "/adminDashboard",
            name: "admin",
            component: () => import("../admin/components/AdminLayout.vue"),
            meta: { requiresAuth: true },
            children: [
                {
                    path: "/adminDashboard",
                    name: "AdminDashboard",
                    component: () => import("../admin/views/Dashboard.vue"),
                },
            ],
        },
    ],
});

export default router;
