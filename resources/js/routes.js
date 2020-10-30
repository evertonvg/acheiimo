import Vue from 'vue'
import Router from 'vue-router'
import Home from './components/header'

Vue.use(Router)

export default new Router({
    mode:'history',
    routes:[
        {path:'/',component: Home},
    ]
})