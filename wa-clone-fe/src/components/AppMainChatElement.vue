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
    <div class="chat overflow-y-scroll py-4 px-5">
        <ul v-if="contactsStore.contacts[activeIndexStore.activeIndex]?.messages" class="p-0 m-0">
            <!-- Message -->
            <li v-for="(message, index) in contactsStore.contacts[activeIndexStore.activeIndex]?.messages" class="my-2">
                <!-- If sent -->
                <div :class="message.status === 'sent' ? 'justify-content-end' : ''" class="row-message d-flex ">
                    <img v-if="message.status === 'received'" class="img-avatar me-2"
                        :src="getImagePath(contactsStore.contacts[activeIndexStore.activeIndex]?.avatar)" alt="Avatar">
                    <img v-else src="../assets/img/avatar_io.png" alt="Avatar">
                    <div class="message-chat">
                        <div :class="message.status" class="message rounded-3 text-md">
                            {{ message.message }}
                            <time>
                                <!-- {{ formatDate(message.date) }} -->
                                13:04
                            </time>
                            <i @click="openMenu(index)" class="fas fa-chevron-down"></i>
                            <ul class="menu">
                                <li class="mb-3">Info messaggio</li>
                                <li @click="deleteMessage(index)" class="mb-2 text-danger">
                                    Elimina
                                    messaggio</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</template>

<style lang="scss" scoped></style>
