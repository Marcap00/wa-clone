<script setup>
import { useActiveIndexStore } from '../../js/stores/active_index'
import { useContactsStore } from '../../js/stores/contacts'
import { useContactInfoStore } from '../../js/stores/contactInfo'
import { computed } from 'vue'
const contactsStore = useContactsStore()
const activeIndexStore = useActiveIndexStore()
const contactInfoStore = useContactInfoStore()

function getImagePath(imagePath) {
    return new URL(`../../assets/img/${imagePath}`, import.meta.url).href;
}

function formatDate(date) {
    return new Date(date).toLocaleTimeString('it-IT', { hour: '2-digit', minute: '2-digit' });
}

const lastMessageTime = computed(() => {
    const lastMessage = contactsStore.contacts[activeIndexStore.activeIndex].messages.filter(message => message.status === 'received')
    return lastMessage[lastMessage.length - 1]?.date
})

const activeContactName = computed(() => {
    return contactsStore.contacts[activeIndexStore.activeIndex]?.name
})

const openContactInfo = () => {
    contactInfoStore.contactInfo = true;
};
</script>

<template>

    <header v-if="contactsStore.contacts.length" class="sticky d-flex align-items-center p-2">
        <img class="img-avatar me-2" :src="contactsStore.contacts[activeIndexStore.activeIndex]?.avatar"
            alt="Avatar utente">
        <!-- Information avatar -->
        <ul class="flex-grow-1" @click="openContactInfo">
            <li>
                <h3>{{ activeContactName }}</h3>
            </li>
            <li v-if="lastMessageTime" class="text-small last-access">Ultimo accesso oggi alle {{
                formatDate(lastMessageTime) }}</li>
        </ul>
        <!-- Icon header right -->
        <div class="icons">
            <i class="fas fa-search mx-3"></i>
            <i class="fas fa-ellipsis-v mx-3"></i>
        </div>
    </header>

</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

header {
    height: 70px;
    background-color: $bg-dark-searchbar;

    h3 {
        color: $text-contacts;
        font-weight: 600;
    }

    .last-access {
        color: $text-contacts;
        font-weight: 600;
    }

    .icons {
        color: $color-icon;
    }

    ul {
        cursor: pointer;
    }
}
</style>
