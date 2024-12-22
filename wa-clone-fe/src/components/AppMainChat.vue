<script setup>
import { ref } from 'vue';
import AppMainChatHeader from './AppMainChatHeader.vue';
import AppMainChatInput from './AppMainChatInput.vue';

const props = defineProps({
    contacts: {
        type: Array,
        required: true
    },
    activeIndex: {
        type: Number,
        required: true
    }
});

function getImagePath(imagePath) {
    return new URL(`../assets/img/${imagePath}`, import.meta.url).href;
}
</script>

<template>
    <div class="col-rght">
        <!-- Header Right -->
        <AppMainChatHeader :contacts="contacts" :activeIndex="activeIndex" />
        <!-- Section of chat -->
        <div class="chat overflow-y-scroll py-4 px-5">
            <ul v-if="contacts[activeIndex]?.messages" class="p-0 m-0">
                <!-- Message -->
                <li v-for="(message, index) in contacts[activeIndex]?.messages" class="my-2">
                    <!-- If sent -->
                    <div :class="message.status === 'sent' ? 'justify-content-end' : ''" class="row-message d-flex ">
                        <img v-if="message.status === 'received'" class="img-avatar me-2"
                            :src="getImagePath(contacts[activeIndex]?.avatar)" alt="Avatar">
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
        <!-- Input -->
        <AppMainChatInput />
    </div>

</template>

<style lang="scss" scoped></style>
