import { defineStore } from 'pinia'


export const useCartStore = defineStore('cart', {
    state: () => ({
        cartItems: []
    }),
   
    getters: {
        countCartItems() {
            return this.cartItems.length;
        },
        getCartItems() {
            return this.cartItems;
        }
    },
    actions: {
        setCartItems(items) {
            this.cartItems = items;
        },
        addToCart(item,quantity) {
            const index = this.cartItems.findIndex(product => product.id === item.id);
            if(index !== -1) {
         
              this.cartItems[index].quantity += quantity;
                localStorage.setItem('cart', JSON.stringify(this.cartItems));
             alert("Item have added in cart");
            
            }else {
              item.quantity = quantity;
              this.cartItems.push(item);
              localStorage.setItem('cart', JSON.stringify(this.cartItems));
                
                alert("Item added to cart");
            }
           
        },
        buyNow(item,quantity) {
            const index = this.cartItems.findIndex(product => product.id === item.id);
            if(index !== -1) {

              this.cartItems[index].quantity += quantity;
              localStorage.setItem('cart', JSON.stringify(this.cartItems));
            
            }else {
              item.quantity = quantity;
              this.cartItems.push(item);
              localStorage.setItem('cart', JSON.stringify(this.cartItems));
            }

        },
        removeFromCart(item) {
            this.cartItems = this.cartItems.filter(product => product.id !== item.id);
            localStorage.setItem('cart', JSON.stringify(this.cartItems));
            alert("Item removed from cart");
        },
        updateItemQuantity(item,event){
            const newQuantity = parseInt(event.target.value);
            item.quantity = newQuantity;
            const index = this.cartItems.findIndex(cartItem => cartItem.id === item.id);
            this.cartItems[index].quantity = item.quantity;
            localStorage.setItem('cart', JSON.stringify(this.cartItems));
          
          },
        calculateItemTotal (item) {
          const total = item.price * item.quantity;
          return total
          },
         calculateSubTotal () {
            const total = this.cartItems.reduce((total, item) => total + this.calculateItemTotal(item), 0).toFixed(2);
            return total
          },
          loadCartItemsFromLocalStorage() {
            const items = JSON.parse(localStorage.getItem('cart')) || [];
            this.setCartItems(items); // Call the mutation to set cart items
          },
          clearCart() {
            this.cartItems = [];
            localStorage.setItem('cart', JSON.stringify(this.cartItems));
           
          }
         
        
    },
});