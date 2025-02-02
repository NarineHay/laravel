import {createRouter, createWebHistory} from 'vue-router';
import NotFound from './components/NotFound.vue';
import Login from './views/auth/Login.vue';
import Register from './views/auth/Register.vue';
import UsersIndex from './views/users/Index.vue';
import WorkShop from './components/WorkShop.vue';
import DashboardIndex from './views/dashboard/Index.vue';






const notfoundRoutes = [

  {
    path: '*',
    name: 'notfound',
    component: NotFound
  }
]

const authRoutes = [

  {
    path: 'register', // Путь по умолчанию для главной страницы
    name: 'auth.register',
    component: Register,
  },
  {
    path: 'login', // Путь по умолчанию для главной страницы
    name: 'auth.login',
    component: Login,
  },
]

const usersRoutes = [
    {
      path: 'users', // Путь по умолчанию для главной страницы
      name: 'users.index',
      component: UsersIndex,
    }
  ]

  const dashboardRoutes = [
    {
      path: 'dashboard', // Путь по умолчанию для главной страницы
      name: 'dashboard.index',
      component: DashboardIndex,
    }
  ]

const routes = [
  {
    path: '/',
    // component: WorkShop, // Родительский компонент, который будет отображать дочерние маршруты
    children: [
      ...authRoutes,
      ...usersRoutes,
      ...dashboardRoutes,
      {
        path: '*',
        name: 'notfound',
        component: NotFound
      }
    ]
  }

];


const router = createRouter({
  history: createWebHistory('/workshop'),
  routes,
})

router.beforeEach((to, from, next) => {
    const accessToken = localStorage.getItem('access_token')


    if(!accessToken){

        if(to.name === 'auth.login' || to.name === 'auth.register'){
            return next();

        }
        else{
            return next({
                'name': 'auth.login'
            })
        }
    }


    if(to.name == 'auth.login' || to.name === 'auth.register' && accessToken){
        return next({
            'name': 'users.index'
        })
    }

    next();
})

export default router
