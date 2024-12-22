<script setup>
import AppHeader from '../components/general/AppHeader.vue'
import AppFooter from '../components/general/AppFooter.vue'
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();
const ApiUrl = "http://127.0.0.1:8000/api/login"
const email = ref('')
const password = ref('')
const successMessage = ref('')
const errorMessage = ref('')
const errorServerMessage = ref('')

function login() {
    axios.post(ApiUrl, {
        email: email.value,
        password: password.value,
        user_id: 1
    })
        .then((response) => {
            console.log(response);
            if (response.status === 200) {
                if (response.data.token) {
                    localStorage.setItem('token', JSON.stringify(response.data.token));
                }
                successMessage.value = response.data.message;
                setTimeout(() => {
                    router.push('/dashboard');
                }, 1000);
            }
        })
        .catch(function (error) {
            console.error('Errore durante il login:', error);
            errorMessage.value = "Errore durante il login";
            if (error.response) {
                console.error('Errore dal server:', error.response.data);
                errorServerMessage.value += "Errore dal server" + error.response.data.message;
            } else if (error.request) {
                console.error('Nessuna risposta dal server');
                errorServerMessage.value += "Nessuna risposta dal server";
            } else {
                console.error('Errore di configurazione:', error.message);
                errorMessage.value = "Errore di configurazione";
            }
        });
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
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="col">
                    <p>Don't have an account? <RouterLink to="/register">Register</RouterLink>
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
