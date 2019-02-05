require('./bootstrap')

window.Vue = require('vue')

Vue.config.productionTip = false

import Home from './components/Home'

const app = new Vue({
    el: '#app',
    components: {
        Home
    }
})