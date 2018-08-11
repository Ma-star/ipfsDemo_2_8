import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Category from '@/components/Category'
import Picture from '@/components/Picture'
import Login from '@/components/Login'
import Register from '@/components/Register'
import Setting from '@/components/Setting'
import Upload from '@/components/Upload'
import Zone from '@/components/Zone'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/category',
      name: 'Category',
      component: Category
    },
    {
      path: '/picture',
      name: 'Picture',
      component: Picture
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/register',
      name: 'Register',
      component: Register
    },
    {
      path: '/setting',
      name: 'Setting',
      component: Setting
    },
    {
      path: '/upload',
      name: 'Upload',
      component: Upload
    },
    {
      path: '/zone',
      name: 'Zone',
      component: Zone
    },
  ]
})
