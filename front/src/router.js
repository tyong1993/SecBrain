import Vue from 'vue'
import Router from 'vue-router'

import Index from './views/Index.vue'
import Detail from './views/Detail.vue'

Vue.use(Router)

export default new Router({
  // mode: 'history',
  routes: [
    {
      path: '/',
      name: 'index',
      component: Index,
    },
    {
      path: '/detail',
      name: 'detail',
      component: Detail,
    },
  ]

})
