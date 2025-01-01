<script setup>
import { useRoute } from 'vue-router'
import { computed } from 'vue'
const route = useRoute()

const isHome = computed(() => route.path === '/')

const classLogo = computed(() => isHome.value ? 'mb-5' : 'me-2')

</script>

<template>
    <img src="/src/assets/img/customs-log.png" alt="Logo" class="img-fluid" :class="classLogo">
</template>

<style lang="scss" scoped>
img {
    width: 250px;

    &.img-fluid {
        max-width: 100%;
        height: auto;
    }
}
</style>
