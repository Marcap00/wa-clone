<script setup>
import { useActiveIndexStore } from '../js/stores/active_index'
import { useContactsStore } from '../js/stores/contacts'
import { onMounted } from 'vue'
import { computed } from 'vue'

const contactsStore = useContactsStore()
const activeIndexStore = useActiveIndexStore()

function getImagePath(imagePath) {
    return new URL(`../assets/img/${imagePath}`, import.meta.url).href;
}

function setActiveContact(i) {
    activeIndexStore.activeIndex = i
    console.log(activeIndexStore.activeIndex)
}

function lastMessageTime(i) {
    const lastMessage = contactsStore.contacts[i].messages.filter(message => message.status === 'received')
    return lastMessage[lastMessage.length - 1]?.date
}

function formatDate(date) {
    return new Date(date).toLocaleTimeString('it-IT', { hour: '2-digit', minute: '2-digit' })
}


onMounted(() => {
    console.log('contactsStore.contacts', contactsStore.contacts)
})
</script>

<template>
    <div class="contacts-list overflow-y-scroll">
        <!-- Contacts List -->
        <ul v-if="contactsStore.contacts.length" class="p-0 m-0">
            <!-- Contact -->
            <li v-for="(contact, i) in contactsStore.contacts" @click="setActiveContact(i)"
                :class="i === activeIndexStore.activeIndex ? 'active' : '', !contact.visible ? 'd-none' : ''"
                class="d-flex align-items-center p-2">
                <img class="img-avatar me-2" :src="getImagePath(contact.avatar)" alt="#">
                <ul class="flex-grow-1">
                    <li>
                        <h3> {{ contact.name }} </h3>
                    </li>
                    <li v-if="contact.messages.length" class="text-small last-message">{{
                        contact.messages[contact.messages.length - 1].message }}</li>
                </ul>
                <time v-if="contact.messages.length">
                    {{ formatDate(contact.messages[contact.messages.length - 1].date) }}
                </time>
            </li>
        </ul>
        <div v-else class="d-flex justify-content-center align-items-center h-100">
            <p class="text-secondary">Aggiungi un nuovo contatto
                <i class="fa-solid fa-user-plus text-secondary"></i>
            </p>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use "../scss/_variables.scss" as *;

.contacts-list>ul li.active {
    background-color: $bg-dark-contacts-active;
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

.contacts-list .last-message {
    color: $text-contacts;
    font-weight: 600;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    max-width: 200px;
}

h3 {
    color: $text-contacts;
    font-weight: 600;
}

.contacts-list::-webkit-scrollbar {
    width: 10px;
}

.contacts-list::-webkit-scrollbar-track {
    background: $bg-dark-scrollbar;
}

.contacts-list::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
}

.contacts-list::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
