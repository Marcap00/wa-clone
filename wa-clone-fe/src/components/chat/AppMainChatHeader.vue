<script setup>
import { useActiveIndexStore } from '../../js/stores/active_index'
import { useContactsStore } from '../../js/stores/contacts'
import { useContactInfoStore } from '../../js/stores/contactInfo'
import { computed, ref } from 'vue'
const contactsStore = useContactsStore()
const activeIndexStore = useActiveIndexStore()
const contactInfoStore = useContactInfoStore()

const isDropdownMenuOpen = ref(false);

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

    <header v-if="contactsStore.contacts.length" class="sticky d-flex align-items-center py-2 px-3">
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
        <div class="icons d-flex align-items-center">
            <i class="fas fa-search mx-2" title="Search..."></i>
            <div class="dropdown-menu" :class="{ 'bg-custom-icon': isDropdownMenuOpen }"
                @click="isDropdownMenuOpen = !isDropdownMenuOpen">
                <i class="fas fa-ellipsis-v" title="Menu"></i>
                <ul class="dropdown-menu-list mt-2" v-if="isDropdownMenuOpen">
                    <li @click="openContactInfo">
                        <p>Contact info</p>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <p>Add to favorites</p>
                        <i class="fas fa-plus mt-1"></i>
                    </li>
                    <li>
                        <p>Close chat</p>
                    </li>
                    <li>
                        <p class="text-danger">Report {{ activeContactName }}</p>
                    </li>
                    <li>
                        <p class="text-danger">Block {{ activeContactName }}</p>
                    </li>
                    <li>
                        <p>Clear chat</p>
                    </li>
                    <li>
                        <p class="text-danger">Delete chat</p>
                    </li>
                </ul>
            </div>
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
        cursor: pointer;
    }

    ul {
        cursor: pointer;
    }

    .dropdown-menu {
        position: relative;
        height: 40px;
        width: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .dropdown-menu-list {
        position: absolute;
        top: 100%;
        right: 0;
        background-color: $bg-dark-contacts;
        border-radius: 10px;
        width: 250px;
        z-index: 1000;

        li {
            margin: 5px 0;
            padding: 5px 15px;

            &:hover {
                background-color: $bg-dark-contacts-active;
            }
        }
    }

    .bg-custom-icon {
        background-color: #bebebe28;
        border-radius: 50%;
    }
}
</style>
