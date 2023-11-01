import { defineStore } from "pinia";
import axiosClient from "../../admin/axiosClient"
export const useUserStore = defineStore("user", {
    state: () => ({
        user: null,
        token: null,
        isAuth: false,
    }),
    getters: {
        getUser() {
            return this.user;
        },
        getToken() {
            return this.token;
        },
        getIsAuth() {
            return this.isAuth;
        },
    },
    actions: {
        setUser(user) {
            this.user = user;
        },
        setToken(token) {
            this.token = token;
        },
        setIsAuth(isAuth) {
            this.isAuth = isAuth;
        },
        logout() {
            this.user = null;
            this.token = null;
            this.isAuth = false;
            localStorage.removeItem("token");
            localStorage.removeItem("user");
            localStorage.removeItem("cart");
        },
        loadUserFromLocalStorage() {
            const token = localStorage.getItem("token");
            const user = JSON.parse(localStorage.getItem("user"));
            if (token && user) {
                this.setToken(token);
                this.setUser(user);
                this.setIsAuth(true);
            }
        },
        login(user) {
            if(user){
                axiosClient.post('/userLogin',user).then(res=>{
                    if(res.data){
                        console.log(res.data);
                        
                        this.setUser(res.data.user);
                        this.setIsAuth(true);
                        localStorage.setItem("user", JSON.stringify(res.data.user));
                        localStorage.setItem("token", JSON.stringify(res.data.token));
                    }
                })
            }
            this.setToken(user.token);
            this.setUser(user);
            this.setIsAuth(true);
            localStorage.setItem("token", user.token);
            localStorage.setItem("user", JSON.stringify(user));
        },
        register(user) {
            if(user){
                axiosClient.post('/userRegister',user).then(res=>{
                    if(res.data){
                        console.log(res.data);
                        
                        this.setUser(res.data);
                        this.setIsAuth(true);
                        localStorage.setItem("user", JSON.stringify(res.data));
                        localStorage.setItem("token", JSON.stringify(res.data.token));
                        
                    }
                })
            }
          
        }
        
    },
});