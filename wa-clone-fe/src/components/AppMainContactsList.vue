<script setup>
import { useActiveIndexStore } from '../js/stores/active_index'
import { useContactsStore } from '../js/stores/contacts'

const contactsStore = useContactsStore()
const activeIndexStore = useActiveIndexStore()

function getImagePath(imagePath) {
    return new URL(`../assets/img/${imagePath}`, import.meta.url).href;
}

function setActiveContact(i) {
    activeIndexStore.activeIndex = i
    console.log(activeIndexStore.activeIndex)
}

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
                    <li class="text-small last-message">Ultimo messaggio inviato</li>
                </ul>
                <time>
                    <!-- {{ formatDate(contact.messages[lastMessageIndex(i)].date) }} -->
                    13:04
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
}

h3 {
    color: $text-contacts;
    font-weight: 600;
}
</style>
