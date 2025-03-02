<script setup>
import AppMainContactsListItem from './AppMainContactsListItem.vue'
import { useContactsStore } from '../../js/stores/contacts'
import { useNewContactStore } from '../../js/stores/newContact'
import { useLabelsStore } from '../../js/stores/labels'
import { useFavoritesStore } from '../../js/stores/favorites'
import { onMounted, computed } from 'vue'

const props = defineProps({
    isNewContact: {
        type: Boolean,
        required: true
    }
})

const contactsStore = useContactsStore()
const favoritesStore = useFavoritesStore()
const labelsStore = useLabelsStore()
const newContactStore = useNewContactStore()
const isFavorites = computed(() => {
    if (labelsStore.labelActive?.name === 'Favorites') {
        localStorage.setItem('favorites', JSON.stringify(favoritesStore.favorites))
        return favoritesStore.favorites
    }
    return contactsStore.contacts
})

function displayNewContact() {
    newContactStore.newContactDisplayed = true;
}



onMounted(() => {
    // console.log('contactsStore.contacts', contactsStore.contacts)
})
</script>

<template>
    <div class="contacts-list"
        :class="{ 'closed-alert': !contactsStore.showAlerts, 'overflow-y-scroll': !props.isNewContact }">
        <!-- Contacts List -->
        <ul v-if="contactsStore.contacts.length" class="p-0 m-1">
            <!-- Contact -->
            <AppMainContactsListItem v-for="(contact, i) in isFavorites" :contact="contact" :i="i" :key="contact.id" />
        </ul>
        <div v-else class="d-flex justify-content-center align-items-center h-100">
            <p @click="displayNewContact" class="chat-empty text-secondary">Add a new contact
                <i class="fa-solid fa-user-plus text-secondary"></i>
            </p>
        </div>
    </div>
</template>

<style lang="scss">
@use "../../scss/_variables.scss" as *;

.contacts-list>ul li.active {
    background-color: $bg-dark-contacts-active;
    box-shadow: 0 0 10px 0.25rem $text-label-active !important;
}

.contacts-list>ul>li:hover {
    background-color: $bg-dark-contacts-hover;
    box-shadow: 0 0 10px 0.25rem $text-label-active !important;
}

.contacts-list {
    height: calc(100% - 245px);
    background-color: $bg-dark-contacts;
    overflow-x: hidden;

    &.closed-alert {
        height: calc(100% - 155px);
    }
}

.contacts-list li {
    position: relative;
    cursor: pointer;
}

.contacts-list time {
    position: absolute;
    top: 10px;
    right: 10px;
    font-weight: 600;
}

.contacts-list .last-message {
    color: $text-contacts;
    font-weight: 600;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    max-width: 350px;

    @media (max-width: 1500px) {
        max-width: 250px;
    }

    @media (max-width: 1160px) {
        max-width: 150px;
    }
}

.contacts-list h3 {
    color: $text-contacts;
}

.contacts-list .highlighted-text {
    color: $text-last-message-received;
    font-weight: 700;
}

.contacts-list .highlighted-text.fa-star {
    color: $text-last-message-received;
}

.chat-empty {
    cursor: pointer;
    font-weight: 600;

    &:hover {
        text-decoration: underline;
    }
}
</style>
