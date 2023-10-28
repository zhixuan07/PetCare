import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        
        {
            path: "/",
            name: "Home",
            component: () => import("../users/views/Homepage.vue"),
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
            path: "/cart",
            name: "Cart",
            component: () => import("../users/views/Cart.vue"),
        },
        {
            path: "/food",
            name: "Food",
            component: () => import("../users/views/Food.vue"),
        },
        {
            path: "/all",
            name: "All",
            component: () => import("../users/views/All.vue"),
        },
        {
            path: "/product",
            name: "Product",
            component: () => import("../users/views/Product.vue"),
        },
        {
            path: "/services",
            name: "Services",
            component: () => import("../users/views/Services.vue"),
        },
        {
            path: "/checkout",
            name: "Checkout",
            component: () => import("../users/views/Checkout.vue"),
        },
        {
            path: "/groomingdate",
            name: "GroomingDate",
            component: () => import("../users/views/GroomingDate.vue"),
        },
        {
            path: "/groomingtime",
            name: "GroomingTime",
            component: () => import("../users/views/GroomingTime.vue"),
        },
        {
            path: "/test",
            name: "Test",
            component: () => import("../users/views/Test.vue"),
        },
        {
            path: "/test2",
            name: "Test2",
            component: () => import("../users/views/Test2.vue"),
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
              {
                path: '/adminOrders',
                name: 'adminOrders',
                component: () => import('../admin/views/Orders.vue'),
              },
              {
                path:'/adminOrderDetails/:id',
                name:'adminOrderDetails',
                component: () => import('../admin/views/OrderDetails.vue'),
              }
              // Add other admin routes here
            ],
          }
          
          
    ],
});
router.beforeEach((to, from, next) => {
    
        next();
    
});

export default router;
