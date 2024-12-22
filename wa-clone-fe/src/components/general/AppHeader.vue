<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
    <header>
        <nav class="d-flex align-items-center gap-3 p-3">
            <RouterLink to="/">
                <img src="/src/assets/img/whatsapp.png" alt="Logo" class="img-fluid">
            </RouterLink>
            <RouterLink to="/">Home</RouterLink>
            <RouterLink to="/login">Login</RouterLink>
            <RouterLink to="/register">Register</RouterLink>
            <RouterLink to="/dashboard">Dashboard</RouterLink>
        </nav>
    </header>
</template>

<style lang="scss" scoped>
header {
    background-color: #eaeaea;

    nav {
        height: 70px;

        img {
            width: 50px;
        }
    }
}
</style>
