import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import PostView from '../views/Post/View.vue'
import PostCreate from '../views/Post/Create.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },{
      path: '/posts',
      name: 'posts',
      component: PostView
    },{
      path: '/posts/create',
      name: 'postsCreate',
      component: PostCreate
    },{
      path: '/posts/create/:postId',
      component: PostCreate
    }
  ]
})

export default router
