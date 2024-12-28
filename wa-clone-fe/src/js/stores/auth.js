import { defineStore } from 'pinia';
import { useContactsStore } from './contacts';

import axios from 'axios';
export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: null,
        userId: null,
        isAuthenticated: false,
        contactsStore: useContactsStore()
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
            this.contactsStore.totalNumberLastMessageReceived = 0
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
        },
        async register(form) {
            try {
                const response = await axios.post('http://localhost:8000/api/register', form, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json'
                    }
                });

                /* if (response.data.user) {
                    this.setUser(response.data.user);
                    localStorage.setItem('token', response.data.access_token);
                } */

                return response;
            } catch (error) {
                console.error('Errore di registrazione:', error.response?.data?.message || error.message);
                throw error;
            }
        }
    }
});
