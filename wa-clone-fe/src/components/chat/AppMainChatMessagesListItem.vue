<script setup>
import { useActiveIndexStore } from '../../js/stores/active_index'
import { useContactsStore } from '../../js/stores/contacts'
import { useAuthStore } from '../../js/stores/auth'
import { computed } from 'vue';
const authStore = useAuthStore()
const contactsStore = useContactsStore()
const activeIndexStore = useActiveIndexStore()

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

function getImagePath(imagePath) {
    return new URL(`../../assets/img/${imagePath}`, import.meta.url).href;
}

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


</script>

<template>
    <li class="my-2">
        <!-- If sent -->
        <div :class="{ 'flex-row-reverse': isMessageSent }" class="row-message d-flex ">
            <img v-if="isMessageReceived" class="img-avatar me-2" :src="getImagePath(ActiveContact?.avatar)"
                alt="Avatar">
            <img v-else :src="user.avatar" alt="Avatar" class="img-avatar ms-2">
            <div class="message-chat">
                <div :class="props.message.status" class="message rounded-3 text-md">
                    {{ props.message.message }}
                    <time>
                        {{ formatDate(props.message.date) }}
                    </time>
                    <i @click="toggleMenuActive(props.index)" class="fas fa-chevron-down"></i>
                    <ul class="menu">
                        <li class="mb-3">Info messaggio</li>
                        <li @click="deleteMessage(props.index)" class="mb-2 text-danger">
                            Elimina
                            messaggio</li>
                    </ul>
                </div>
            </div>
        </div>
    </li>

</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.message-chat .message {
    width: 250px;
    padding: .8rem 1rem;

    position: relative;
}

.message-chat .sent {
    background-color: $bg-sent-message;
    color: $text-title;
}

.message-chat .received {
    background-color: $bg-dark-searchbar;
    color: $text-title;
}

.message-chat .message time {
    position: absolute;
    bottom: 5px;
    right: 5px;
    font-weight: 600;
}

.message-chat .message i {
    position: absolute;
    top: 5px;
    right: 5px;
    color: #b1b1b1;
    cursor: pointer;

    display: none;
}

.message-chat .message:hover i {
    display: block;
}

.message-chat .menu {
    position: absolute;
    top: 20px;
    right: 5px;
    background-color: $bg-dark-contacts;
    width: 180px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
    z-index: 1;
    display: none;
}

.message-chat .menu.active {
    display: block;
}

.message-chat .menu li {
    cursor: pointer;
}
</style>
