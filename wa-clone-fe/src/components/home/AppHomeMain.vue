<script setup>
import AppHomeMainHero from './AppHomeMainHero.vue'
import AppHomeMainServices from './AppHomeMainServices.vue'
import AppHomeMainContacts from './AppHomeMainContacts.vue'
</script>

<template>
    <main class="home h-main overflow-y-scroll">
        <AppHomeMainHero />
        <AppHomeMainServices />
        <AppHomeMainContacts />
    </main>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

main {
    background-color: $bg-dark-searchbar;
}
</style>
