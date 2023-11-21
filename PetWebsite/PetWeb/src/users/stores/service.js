import { defineStore } from "pinia";

export const useServiceStore = defineStore("service", {
    state: () => ({
        serviceItems: [],
    }),
    getters: {
        countServiceItems() {
            return this.serviceItems.length;
        },
        getServiceItems() {
            return this.serviceItems;
        },
    },
    actions: {
        setServiceItems(items) {
            this.serviceItems = items;
        },

        loadServiceItemsFromLocalStorage() {
            const items = JSON.parse(localStorage.getItem("service")) || [];
            this.setServiceItems(items); // Call the mutation to set cart items
        },
        clearService() {
            this.serviceItems = [];
            localStorage.setItem("service", JSON.stringify(this.cartItems));
        },
        calculateTotal() {
            if (this.serviceItems.typeService === "Haircut and Styling") {
               const total = 50 * this.serviceItems.numberPet;
               console.log(total);
                return total;
                
            } else {
                const total = 65 * this.serviceItems.numberPet;
                return total;
            }
        },
    },
});
