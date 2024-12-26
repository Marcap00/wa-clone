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
    height: calc(100% - 150px);
    background-color: $bg-dark-contacts;
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

.number-last-message-received {
    position: absolute;
    bottom: 7px;
    right: 7px;
    font-weight: 600;
    background-color: $text-last-message-received;
    color: #fff;
    border-radius: 50%;
    width: 16px;
    height: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
}

.contacts-list .last-message {
    color: $text-contacts;
    font-weight: 600;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    max-width: 200px;
}

.contacts-list h3 {
    color: $text-contacts;
    font-weight: 600;
}

.contacts-list .highlighted-text {
    color: $text-last-message-received;
    font-weight: 700;
}
</style>
