import { defineStore } from "pinia";
import { useRouter } from "vue-router";
import axiosClient from "../../admin/axiosClient";
const router = useRouter();
export const useUserStore = defineStore("user", {
    state: () => ({
        user: null,
        token: null,
        isAuth: false,
        errmsg: null,
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
            location.reload();
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
        async login(user) {
          
            try {
               const response = await axiosClient.post("/userLogin", user)
               this.setUser(response.data.user);
               this.setIsAuth(true);
               localStorage.setItem(
                   "user",
                   JSON.stringify(response.data.user)
               );
               localStorage.setItem(
                   "token",
                   JSON.stringify(response.data.token)
               );
               this.errmsg = null;
            } catch (error) {
                this.errmsg = 'Login failed. Please check your credentials.';
               
            }
        },
        register(user) {
            if (user) {
                axiosClient
                    .post("/userRegister", user)
                    .then((res) => {
                        if (res.data) {
                            console.log(res.data);

                            this.setUser(res.data);
                            this.setIsAuth(true);
                            localStorage.setItem(
                                "user",
                                JSON.stringify(res.data)
                            );
                            localStorage.setItem(
                                "token",
                                JSON.stringify(res.data.token)
                            );
                            router.push("/");
                        } else {
                            // Handle the case where the response doesn't contain the expected data
                            console.error("Unexpected response format:", res);
                        }
                    })
                    .catch((error) => {
                        // Handle errors that occur during the request
                        console.error("Registration failed:", error);
                    });
            }
        },
        async updateUserProfile(updatedUser, userID) {
            console.log(userID);
            try {
                // Make an API request to update the user profile on the server
                const response = await axiosClient.post(
                    `/updateUserProfile/${userID}`,
                    updatedUser
                );
                
                // Optionally, update the store state with the updated user data
                this.user = response.data.user;

                return response.data;
            } catch (error) {
                throw new Error(
                    error.response.data.message ||
                        "Failed to update user profile"
                );
            }
        },
    },
});
