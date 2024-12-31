<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
    <header>
        <nav class="d-flex justify-content-between align-items-center p-3">
            <div class="nav-right d-flex align-items-center gap-3">
                <RouterLink to="/">
                    <img src="/src/assets/img/whatsapp.png" alt="Logo" class="img-fluid">
                </RouterLink>
                <RouterLink to="/">
                    <h1>WA Clone</h1>
                </RouterLink>
                <!-- <RouterLink to="/dashboard">Dashboard</RouterLink> -->
            </div>
            <div class="nav-center d-flex align-items-center gap-3">
                <RouterLink to="/">Home</RouterLink>
                <RouterLink to="/">About</RouterLink>
                <RouterLink to="/">Contacts</RouterLink>
            </div>
            <div class="nav-left d-flex align-items-center gap-3">
                <RouterLink class="btn" to="/login">Login</RouterLink>
                <RouterLink class="btn" to="/register">Register</RouterLink>
            </div>
        </nav>
    </header>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

header {
    background-color: $bg-dark-contacts;
    color: $text-title;

    nav {
        height: 70px;

        h1 {
            font-size: 1.5rem;
            font-weight: 600;
        }

        img {
            width: 50px;
        }

        a {
            color: $text-title;
            font-weight: 600;
        }

        .nav-center {
            a:hover {
                background: linear-gradient(to right, #76ffe1, #00a884);
                background-clip: text;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                color: transparent;
                scale: 1.05;
                transition: all 0.3s ease;
                text-decoration: underline;
            }
        }
    }

    .btn {
        padding: 10px 20px;
        border-radius: 10px;
        background-color: $bg-label-active;
        border: 3px solid $text-label-active;
        color: $text-label-active;

        &:hover {
            background-color: $bg-label-active-hover;
            scale: 1.05;
            transition: all 0.3s ease;
        }

        &:active {
            scale: 1;
        }
    }
}
</style>
