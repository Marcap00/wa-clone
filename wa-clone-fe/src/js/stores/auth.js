import { defineStore } from 'pinia';

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: localStorage.getItem('user') ? JSON.parse(localStorage.getItem('user')) : null
    }),
    getters: {
        isAuthenticated: (state) => state.user !== null,
        userId: (state) => localStorage.getItem('userId') ? JSON.parse(localStorage.getItem('userId')) : state.user?.id,
        user: (state) => localStorage.getItem('user') ? JSON.parse(localStorage.getItem('user')) : state.user
    },
    actions: {
        setUser(user) {
            this.user = user;
            localStorage.setItem('userId', JSON.stringify(user.id));
            localStorage.setItem('user', JSON.stringify(user));
        },
        logout() {
            this.user = null;
            localStorage.removeItem('userId');
            localStorage.removeItem('user');
        }
    }
});
