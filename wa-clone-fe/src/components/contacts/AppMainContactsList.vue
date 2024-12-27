<script setup>
import AppMainContactsListItem from './AppMainContactsListItem.vue'
import { useContactsStore } from '../../js/stores/contacts'
import { onMounted } from 'vue'

const contactsStore = useContactsStore()

onMounted(() => {
    // console.log('contactsStore.contacts', contactsStore.contacts)
})
</script>

<template>
    <div class="contacts-list overflow-y-scroll">
        <!-- Contacts List -->
        <ul v-if="contactsStore.contacts.length" class="p-0 m-0">
            <!-- Contact -->
            <AppMainContactsListItem v-for="(contact, i) in contactsStore.contacts" :contact="contact" :i="i"
                :key="contact.id" />
        </ul>
        <div v-else class="d-flex justify-content-center align-items-center h-100">
            <p class="text-secondary">Aggiungi un nuovo contatto
                <i class="fa-solid fa-user-plus text-secondary"></i>
            </p>
        </div>
    </div>
</template>

<style lang="scss">
@use "../../scss/_variables.scss" as *;

.contacts-list>ul li.active {
    background-color: $bg-dark-contacts-active;
}

.contacts-list>ul li:hover {
    background-color: $bg-dark-contacts-hover;
}

.contacts-list {
    height: calc(100% - 190px);
    background-color: $bg-dark-contacts;
    overflow-x: hidden;
}

.contacts-list li {
    position: relative;
    cursor: pointer;
}

.contacts-list time {
    position: absolute;
    top: 5px;
    right: 5px;
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
</style>
