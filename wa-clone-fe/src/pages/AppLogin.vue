<script setup>
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
    <main class="h-main d-flex justify-content-center align-items-center p-4">
        <div class="alert alert-success" v-if="successMessage">
            {{ successMessage }}
        </div>
        <div class="alert alert-danger" v-if="errorMessage">
            {{ errorMessage }}
            <br>
            Le credenziali potrebbero essere non corrette o potresti essere non registrato
        </div>
        <div class="container">
            <form @submit.prevent="login" class="d-flex flex-column align-items-center card p-3 rounded-4">
                <h1 class="mb-4">Login</h1>
                <!-- <div class="col-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" placeholder="Email" id="email" name="email" class="form-control" required
                        autofocus autocomplete="username" v-model="email">
                </div> -->
                <div data-bs-theme="dark" class="col-6 form-floating mb-4">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                        v-model="email" autocomplete="off" required autofocus>
                    <label for="email">Email address</label>
                </div>
                <!-- <div class="col-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" placeholder="Password" id="password" name="password" class="form-control"
                        required autocomplete="current-password" v-model="password">
                </div> -->
                <div data-bs-theme="dark" class="col-6 form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        v-model="password" autocomplete="off" required>
                    <label for="password">Password</label>
                </div>
                <div class="col">
                    <button type="submit" class="btn-custom text-white mb-3 me-3">Login</button>
                    <button type="reset" class="btn-custom text-white mb-3">Reset</button>
                </div>
                <div class="col">
                    <p>Don't have an account? <RouterLink to="/register">Register</RouterLink>
                    </p>
                </div>
            </form>
        </div>
    </main>
</template>

<style lang="scss" scoped>
@use "bootstrap/scss/bootstrap.scss" as *;
@import '../scss/_variables.scss';

main {
    background-color: $bg-dark-searchbar;
}

.card {
    background-color: $bg-dark-contacts;
    border: 3px solid $text-label-active;
    box-shadow: 0 0 10px 0.25rem $text-label-active;

}

h1 {
    text-align: center;
    color: $text-label-active;
}


label,
p {
    color: $text-title;
}

p>a {
    color: $text-label-active;
}

.btn-custom {
    padding: 10px 20px;
    border-radius: 10px !important;
    background-color: $bg-label-active !important;
    border: 3px solid $text-label-active !important;

    &:hover {
        background-color: $bg-label-active-hover !important;
        scale: 1.05 !important;
        transition: all 0.3s ease !important;
    }

    &:active {
        scale: 1 !important;
    }
}

input {
    &:focus {
        box-shadow: 0 0 10px 0.25rem $text-label-active !important;
    }
}
</style>
