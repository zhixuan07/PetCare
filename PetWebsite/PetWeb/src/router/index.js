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
            path: '/admin',
            name: 'admin',
            component: () => import('../admin/components/AdminLayout.vue'), // Use the layout component
         
            children: [
              {
                path: '/adminDashboard',
                name: 'adminDashboard',
                component: () => import('../admin/views/Dashboard.vue'),
              },
              {
                path: '/adminProducts',
                name: 'adminProducts',
                component: () => import('../admin/views/Products.vue'),
              },
              // Add other admin routes here
            ],
          }
          
          
    ],
});
router.beforeEach((to, from, next) => {
    
        next();
    
});

export default router;
