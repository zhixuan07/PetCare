import { createStore } from "vuex";
import axiosClient from "../axios/axios.js";

const store = createStore({
    state:{
        admin:{
            data: {},
            token: sessionStorage.getItem("TOKEN"),
        },

    },
    mutations: {
        setAdmin(state, admin) {
            state.admin.data = admin;
        },
        setToken: (state, token) => {
            state.admin.token = token;
            sessionStorage.setItem("TOKEN", token);
        },
        logout: (state) => {
            state.admin.token = null;
            state.admin.data = {};
            sessionStorage.removeItem("TOKEN");
        },

    },
    actions: {
         async getAdmin({ commit },admin) {
            return axiosClient.post("/adminLogin", admin).then(({ data }) => {
                commit("setAdmin", data.admin);
                commit("setToken", data.token);
            
                
                return data;
            });
        }

    },
    getters: {
        getAdmin(state) {
            return state.admin;
        }
    }
});
export default store;