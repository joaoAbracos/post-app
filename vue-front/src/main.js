import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

const app = createApp(App)

import { library } from '@fortawesome/fontawesome-svg-core'
import { faTrashAlt, faEdit, faPlus ,faArrowUp, faArrowDown } from '@fortawesome/free-solid-svg-icons'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


library.add(faTrashAlt,faEdit,faPlus,faArrowUp, faArrowDown)


app.use(router)
app.component('font-awesome-icon', FontAwesomeIcon)
app.mount('#app')
