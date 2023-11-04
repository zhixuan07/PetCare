import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { useUserStore } from './users/stores/user'


import './style.css'
import App from './App.vue'
import router from './router'
import store from './store'



const pinia = createPinia()
const app = createApp(App)

app.use(router)
app.use(pinia)
app.use(store)



app.mount("#app")
