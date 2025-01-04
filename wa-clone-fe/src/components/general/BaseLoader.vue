<script setup>
import BaseLogo from './BaseLogo.vue'
import BaseLogoText from './BaseLogoText.vue'
import { useRoute } from 'vue-router'
import { computed } from 'vue'
import { useContactsStore } from '../../js/stores/contacts'
const route = useRoute()
const contactsStore = useContactsStore()

const classLoader = computed(() => {
    if (route.path === '/dashboard') {
        return 'loader-contacts'
    }
    /* return 'loader-chat' */
})
</script>

<template>
    <div class="loader-container" :class="classLoader, { 'closed-alert': !contactsStore.showAlerts }">
        <div class="d-flex align-items-center gap-2">
            <BaseLogo />
            <BaseLogoText />
        </div>
        <div class="loader"></div>
    </div>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.loader-container {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    justify-content: center;
    align-items: center;
    // height: 100%;
}

.loader-contacts {
    background-color: $bg-dark-contacts;
    height: calc(100% - 245px);

    &.closed-alert {
        height: calc(100% - 155px);
    }
}

/* Credits: https://css-loaders.com/progress/  */
/* HTML: <div class="loader"></div> */
.loader {
    height: 4px;
    width: 130px;
    --c: no-repeat linear-gradient(rgb(0, 168, 132) 0 0);
    background: var(--c), var(--c), #fff;
    background-size: 60% 100%;
    animation: l16 3s infinite;
}

@keyframes l16 {
    0% {
        background-position: -150% 0, -150% 0
    }

    66% {
        background-position: 250% 0, -150% 0
    }

    100% {
        background-position: 250% 0, 250% 0
    }
}
</style>
