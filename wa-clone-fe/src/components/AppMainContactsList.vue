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
        <ul class="p-0 m-0">
            <!-- Contact -->
            <li v-for="(contact, i) in contactsStore.contacts" @click="setActiveContact(i)"
                :class="i === activeIndexStore.activeIndex ? 'active' : '', !contact.visible ? 'd-none' : ''"
                class="d-flex align-items-center p-2">
                <img class="img-avatar me-2" :src="getImagePath(contact.avatar)" alt="#">
                <ul class="flex-grow-1">
                    <li>
                        <h3> {{ contact.name }} </h3>
                    </li>
                    <li class="text-small text-lightgrey">Ultimo messaggio inviato</li>
                </ul>
                <time>
                    <!-- {{ formatDate(contact.messages[lastMessageIndex(i)].date) }} -->
                    13:04
                </time>
            </li>
        </ul>
    </div>

</template>

<style lang="scss" scoped>
.contacts-list>ul li.active {
    background-color: #e9ebeb;
}

.contacts-list {
    height: calc(100% - 150px);
    background-color: #fff;
}

.contacts-list li {
    position: relative;
    cursor: pointer;
}

.contacts-list time {
    position: absolute;
    top: 5px;
    right: 5px;
}
</style>
