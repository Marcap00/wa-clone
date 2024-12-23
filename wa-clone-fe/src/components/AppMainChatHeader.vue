<script setup>
import { useActiveIndexStore } from '../js/stores/active_index'
import { useContactsStore } from '../js/stores/contacts'

const contactsStore = useContactsStore()
const activeIndexStore = useActiveIndexStore()

function getImagePath(imagePath) {
    return new URL(`../assets/img/${imagePath}`, import.meta.url).href;
}
</script>

<template>

    <header v-if="contactsStore.contacts.length" class="sticky d-flex align-items-center p-2">
        <img class="img-avatar me-2" :src="getImagePath(contactsStore.contacts[activeIndexStore.activeIndex]?.avatar)"
            alt="Avatar utente">
        <!-- Information avatar -->
        <ul class="flex-grow-1">
            <li>
                <h3>{{ contactsStore.contacts[activeIndexStore.activeIndex]?.name }}</h3>
            </li>
            <li class="text-small last-access">Ultimo accesso oggi alle 12:00</li>
        </ul>
        <!-- Icon header right -->
        <div class="icons">
            <i class="fas fa-search mx-2"></i>
            <i class="fas fa-message mx-2"></i>
            <i class="fas fa-paperclip mx-2"></i>
        </div>
    </header>

</template>

<style lang="scss" scoped>
@use "../scss/_variables.scss" as *;

header {
    height: 50px;
    background-color: $bg-dark-searchbar;

    h3 {
        color: $text-contacts;
        font-weight: 600;
    }

    .last-access {
        color: $text-contacts;
        font-weight: 600;
    }
}
</style>
