<script setup>
import { useActiveIndexStore } from '../js/stores/active_index'
import { useContactsStore } from '../js/stores/contacts'

const contactsStore = useContactsStore()
const activeIndexStore = useActiveIndexStore()

function getImagePath(imagePath) {
    return new URL(`../assets/img/${imagePath}`, import.meta.url).href;
}

defineProps({
    message: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <li class="my-2">
        <!-- If sent -->
        <div :class="{ 'flex-row-reverse': message.status === 'sent' }" class="row-message d-flex ">
            <img v-if="message.status === 'received'" class="img-avatar me-2"
                :src="getImagePath(contactsStore.contacts[activeIndexStore.activeIndex]?.avatar)" alt="Avatar">
            <img v-else src="../assets/img/avatar_io.png" alt="Avatar" class="img-avatar ms-2">
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

</template>

<style lang="scss" scoped></style>
