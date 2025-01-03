<script setup>
import { useActiveIndexStore } from '../../js/stores/activeIndex'
import { useContactsStore } from '../../js/stores/contacts'
import { useAuthStore } from '../../js/stores/auth'
import { useMessageInfoStore } from '../../js/stores/messageInfo'
import { useContactInfoStore } from '../../js/stores/contactInfo'
import { computed } from 'vue';
import axios from 'axios';

const authStore = useAuthStore()
const contactsStore = useContactsStore()
const activeIndexStore = useActiveIndexStore()
const messageInfoStore = useMessageInfoStore()
const contactInfoStore = useContactInfoStore()
const user = localStorage.getItem('user') ? JSON.parse(localStorage.getItem('user')) : authStore.user;

const props = defineProps({
    message: {
        type: Object,
        required: true
    },
    index: {
        type: Number,
        required: true
    }
})

/* function getImagePath(imagePath) {
    return new URL(`../../assets/img/${imagePath}`, import.meta.url).href;
} */

function formatDate(date) {
    return new Date(date).toLocaleTimeString('it-IT', { hour: '2-digit', minute: '2-digit' });
}

function toggleMenuActive(index) {
    const menu = document.querySelectorAll('.menu');
    menu[index].classList.toggle('active');
}

const ActiveContact = computed(() => {
    return contactsStore.contacts[activeIndexStore.activeIndex]
})

const isMessageReceived = computed(() => {
    return props.message.status === 'received'
})

const isMessageSent = computed(() => {
    return props.message.status === 'sent'
})

async function deleteMessage(id) {
    try {
        const response = await axios.delete(`http://localhost:8000/api/messages/delete/${id}`);
        console.log(response);
        contactsStore.getContacts();
    } catch (error) {
        console.error(error);
    }
}

function showMessageInfo() {
    messageInfoStore.dataSingleMessage = props.message
    if (contactInfoStore.contactInfo) {
        contactInfoStore.contactInfo = false
    }
    if (messageInfoStore.showMessageInfo) {
        messageInfoStore.showMessageInfo = false
    }
    setTimeout(() => {
        messageInfoStore.showMessageInfo = true
    }, 200)
    toggleMenuActive(props.index)
}
</script>

<template>
    <li class="my-2">
        <!-- If sent -->
        <div :class="{ 'flex-row-reverse': isMessageSent }" class="row-message d-flex ">
            <img v-if="isMessageReceived" class="img-avatar me-2" :src="ActiveContact?.avatar" alt="Avatar">
            <img v-else :src="user.avatar_placeholder" alt="Avatar" class="img-avatar ms-2">
            <div class="message-chat">
                <div :class="props.message.status" class="message rounded-3 text-md">
                    {{ props.message.message }}
                    <time>
                        {{ formatDate(props.message.date) }}
                    </time>
                    <i @click="toggleMenuActive(props.index)" class="fas fa-chevron-down"></i>
                    <ul class="menu">
                        <li class="mb-3" @click="showMessageInfo">Message Info</li>
                        <li @click="deleteMessage(props.message.id)" class="mb-2 text-danger">
                            Delete Message
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </li>

</template>

<style lang="scss" scoped></style>
