import { createRouter, createWebHistory } from 'vue-router';
import AppHome from '../pages/AppHome.vue';
import AppDashboard from '../pages/AppDashboard.vue';
import AppLogin from '../pages/AppLogin.vue';
import AppRegister from '../pages/AppRegister.vue';
import Unauthorized from '../components/errors/Unauthorized.vue';
const routes = [
    { path: '/', component: AppHome, name: 'home' },
    { path: '/login', component: AppLogin, name: 'login' },
    { path: '/register', component: AppRegister, name: 'register' },
    { path: '/dashboard', component: AppDashboard, name: 'dashboard' },
    { path: '/unauthorized', component: Unauthorized, name: 'unauthorized' },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
