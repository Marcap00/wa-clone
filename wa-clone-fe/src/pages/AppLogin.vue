<script setup>
import AppHeader from '../components/general/AppHeader.vue'
import AppFooter from '../components/general/AppFooter.vue'
import axios from 'axios';
import { ref } from 'vue';
const ApiUrl = "http://127.0.0.1:8000/api/login"
const email = ref('')
const password = ref('')

function login() {
    axios.post(ApiUrl, {
        email: email.value,
        password: password.value
    }, {
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
        .then((response) => {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
}
</script>

<template>
    <AppHeader />
    <main class="h-main">
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
