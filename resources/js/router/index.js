import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Posts from '../pages/Posts.index.vue'
import Post from '../pages/Posts.show.vue'
import Contact from '../pages/Contact.vue'

const routes = [
    {
        path: '/posts',
        name: 'posts.index',
        component: Posts
    },
    {
        path: '/posts/:slug',
        name: 'posts.show',
        component: Post
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact
    }, 
] 
    

const router = new VueRouter({
    mode: 'history',
    routes: routes
})

export default router