import { defineStore } from 'pinia';

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: null,
        userId: null,
        isAuthenticated: false
    }),
    actions: {
        setUser(user) {
            this.user = user;
            this.userId = user.id;
            this.isAuthenticated = true;

            localStorage.setItem('user_id', JSON.stringify(user.id));
            localStorage.setItem('user', JSON.stringify(user));
        },
        logout() {
            this.user = null;
            this.userId = null;
            this.isAuthenticated = false;

            localStorage.removeItem('token');
            localStorage.removeItem('user_id');
            localStorage.removeItem('user');
        },
        initializeFromStorage() {
            const storedUser = localStorage.getItem('user');
            const storedUserId = localStorage.getItem('user_id');

            if (storedUser && storedUserId) {
                this.user = JSON.parse(storedUser);
                this.userId = JSON.parse(storedUserId);
                this.isAuthenticated = true;
            }
        }
    }
});
