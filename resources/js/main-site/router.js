import {createRouter, createWebHistory} from 'vue-router';
import mainIndex from './views/main/Index.vue';


const routes = [
  {
    path: '/',
    component: mainIndex, // Родительский компонент, который будет отображать дочерние маршруты
    children: [
    //   ...authRoutes

    ]
  }

];


const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
