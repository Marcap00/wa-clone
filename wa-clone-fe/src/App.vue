<script setup>
import { RouterView, useRoute } from 'vue-router'
import AppHeader from './components/general/AppHeader.vue'
import AppFooter from './components/general/AppFooter.vue'
import { computed } from 'vue'
const route = useRoute()
const isDashboardPage = computed(() => route.path.includes('dashboard'))
</script>

<template>
    <AppHeader v-if="!isDashboardPage" />
    <RouterView />
    <AppFooter v-if="!isDashboardPage" />
</template>

<style lang="scss">
// @use "bootstrap/scss/bootstrap.scss" as *;

@use "bootstrap/scss/bootstrap-grid.scss" as *;
@use "bootstrap/scss/bootstrap-utilities.scss" as *;

@use "./scss/general.scss" as *;
</style>
