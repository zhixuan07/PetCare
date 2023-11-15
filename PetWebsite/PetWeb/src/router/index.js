import { createRouter, createWebHistory } from "vue-router";



const router = createRouter({
    history: createWebHistory(),
    routes: [
        
        {
            path: "/",
            name: "Home",
            meta: { isGuest: true },
            component: () => import("../users/views/Homepage.vue"),
            children: [ 
               
            ],


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
            component: () => import("../users/views/Cart.vue")
        },
        {
            path: "/food",
            name: "Food",
            component: () => import("../users/views/Food.vue"),
            

        },
        {
            path:"/food/cat",
            name:"CatFood",
            component:()=>import("../users/views/CatFood.vue")
        },
        {
            path:"/food/dog",
            name:"DogFood",
            component:()=>import("../users/views/DogFood.vue")
        },
        {
            path: "/all",
            name: "All",
            component: () => import("../users/views/All.vue"),
        },
        {
            path: "/product/:id",
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
            path: "/groomingAppointment",
            name: "GroomingAppointment",
            component: () => import("../users/views/GroomingAppointment.vue"),
        },
        {
            path: "/groomingCheckout",
            name: "GroomingCheckout",
            component: () => import("../users/views/GroomingCheckout.vue"),
        },
        {
            path: "/grooming",
            name: "Grooming",
            component: () => import("../users/views/Grooming.vue"),

        },
        {
            path: "/userprofile",
            name: "UserProfile",
            component: () => import("../users/views/UserProfile.vue"),
        },
        {
            path: "/editprofile",
            name: "EditProfile",
            component: () => import("../users/views/EditProfile.vue"),
        },
        {
            path: "/orders",
            name: "Orders",
            component: () => import("../users/views/Orders.vue"),
        },
        {
            path: "/userOrderDetails/:id",
            name: "OrderDetails",
            component: () => import("../users/views/OrderDetails.vue"),
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
              },
              {
                path:'/adminAppointment',
                name:'adminAppointment',
                component: () => import('../admin/views/Appointment.vue'),
              }
              // Add other admin routes here
            ],
          }
          
          
    ],
});
router.beforeEach((to, from, next) => {
next()
   
});

export default router;
