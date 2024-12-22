import { createRouter, createWebHistory } from 'vue-router';
import AppHome from '../pages/AppHome.vue';
import AppDashboard from '../pages/AppDashboard.vue';
import AppLogin from '../pages/AppLogin.vue';
import AppRegister from '../pages/AppRegister.vue';

const routes = [
    { path: '/', component: AppHome, name: 'home' },
    { path: '/login', component: AppLogin, name: 'login' },
    { path: '/register', component: AppRegister, name: 'register' },
    { path: '/dashboard', component: AppDashboard, name: 'dashboard' },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
