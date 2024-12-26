<script setup>
import AppHeader from '../components/general/AppHeader.vue'
import AppFooter from '../components/general/AppFooter.vue'
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from '../js/stores/auth';


const router = useRouter();
const authStore = useAuthStore();
const ApiUrl = "http://127.0.0.1:8000/api/login"
const email = ref('')
const password = ref('')
const successMessage = ref('')
const errorMessage = ref('')
const errorServerMessage = ref('')

async function login() {
    try {
        const response = await axios.post(ApiUrl, {
            email: email.value,
            password: password.value,
        });

        if (response.status === 200) {
            const { token, user } = response.data;

            // Salva il token
            localStorage.setItem('token', token);

            // Imposta l'utente nello store
            authStore.setUser(user);

            successMessage.value = "Login effettuato con successo";

            setTimeout(() => {
                router.push('/dashboard');
            }, 1000);
        }
    } catch (error) {
        console.error('Errore durante il login:', error);
        errorMessage.value = "Errore durante il login";

        if (error.response?.data?.message) {
            errorServerMessage.value = error.response.data.message;
        } else {
            errorServerMessage.value = "Errore di connessione al server";
        }
    }
}
</script>

<template>
    <AppHeader />
    <main class="h-main">
        <div class="alert alert-success" v-if="successMessage">
            {{ successMessage }}
        </div>
        <div class="alert alert-danger" v-if="errorMessage">
            {{ errorMessage }}
            <br>
            Le credenziali potrebbero essere non corrette o potresti essere non registrato
        </div>
        <div class="container">
            <h1>Login</h1>
            <form @submit.prevent="login" class="d-flex flex-column">
                <div class="col-5 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" placeholder="Email" id="email" name="email" class="form-control" required
                        autofocus autocomplete="username" v-model="email">
                </div>
                <div class="col-5 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" placeholder="Password" id="password" name="password" class="form-control"
                        required autocomplete="current-password" v-model="password">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Accedi</button>
                </div>
                <div class="col">
                    <p>Non hai un account? <RouterLink to="/register">Registrati</RouterLink>
                    </p>
                </div>
            </form>
        </div>
    </main>
    <AppFooter />
</template>

<style lang="scss" scoped>
@use "bootstrap/scss/bootstrap.scss" as *;
</style>
