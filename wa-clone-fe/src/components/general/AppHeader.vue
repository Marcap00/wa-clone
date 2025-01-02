<script setup>
import { RouterLink, useRoute } from 'vue-router'
import { computed } from 'vue'
import BaseLogo from './BaseLogo.vue'
import BaseLogoText from './BaseLogoText.vue'
const route = useRoute()

const isLoginPage = computed(() => route.path.includes('login'))
const isRegisterPage = computed(() => route.path.includes('register'))
const isLoginOrRegisterPage = computed(() => isLoginPage.value || isRegisterPage.value)
</script>

<template>
    <header class="sticky-top">
        <nav class="d-flex justify-content-between align-items-center p-3">
            <div class="nav-left d-flex align-items-center">
                <RouterLink to="/">
                    <BaseLogo />
                </RouterLink>
                <RouterLink to="/">
                    <!-- <h1 class="mb-1">WA Clone</h1> -->
                    <BaseLogoText />
                </RouterLink>
                <!-- <RouterLink to="/dashboard">Dashboard</RouterLink> -->
            </div>
            <div v-if="isLoginOrRegisterPage" class="nav-center d-flex align-items-center gap-3">
                <RouterLink to="/">Home</RouterLink>
                <RouterLink to="/">Services</RouterLink>
                <RouterLink to="/">Contacts</RouterLink>
            </div>
            <div v-else class="nav-center d-flex align-items-center gap-3">
                <a href="#hero">Home</a>
                <a href="#services">Services</a>
                <a href="#contacts">Contacts</a>
            </div>
            <div v-if="!isLoginOrRegisterPage" class="nav-right d-flex align-items-center gap-3">
                <RouterLink class="btn-custom" to="/login">Login</RouterLink>
                <RouterLink class="btn-custom" to="/register">Register</RouterLink>
            </div>
        </nav>
    </header>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

header {
    background-color: $bg-dark-contacts;
    color: $text-title;
    box-shadow: $text-label-active 0px 10px 20px 0px;

    nav {
        height: 70px;

        h1 {
            font-size: 1.5rem;
            font-weight: 600;
        }

        a {
            color: $text-title;
            font-weight: 600;
        }

        .nav-center a:hover,
        .nav-left:hover {
            scale: 1.05;
            transition: all 0.3s ease;
        }

        .nav-center a:hover {
            background: linear-gradient(to right, #76ffe1, #00a884);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
            text-decoration: underline;
        }
    }
}
</style>
