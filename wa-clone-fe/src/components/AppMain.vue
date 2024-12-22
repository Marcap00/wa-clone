<script setup>
import AppMainContacts from './AppMainContacts.vue';
import axios from 'axios';
import { ref } from 'vue';
import { onMounted } from 'vue';
const contacts = ref([]);
const apiUrlContacts = 'http://localhost:8000/api/contacts';
const activeIndex = ref(0);

async function getContacts() {
    try {
        const response = await axios.get(apiUrlContacts);
        contacts.value = response.data.results;
        console.log(contacts.value);
    } catch (error) {
        console.error('Errore nel caricamento dei contatti:', error);
    }
}

function getImagePath(imagePath) {
    return new URL(`../assets/img/${imagePath}`, import.meta.url).href;
}

onMounted(async () => {
    await getContacts();
});

</script>

<template>
    <!-- Main -->
    <main class="vh-100">
        <!-- Container -->
        <div class="container h-100 py-4">
            <!-- Wrapper -->
            <div class="wrapper d-flex h-100">
                <!-- Left Column -->
                <AppMainContacts :contacts="contacts" :activeIndex="activeIndex" />
                <!-- Right Column -->
                <div class="col-rght">
                    <!-- Header Right -->
                    <header v-if="contacts.length" class="sticky d-flex align-items-center p-2">
                        <img class="img-avatar me-2" :src="getImagePath(contacts[activeIndex]?.avatar)"
                            alt="Avatar utente">
                        <!-- Information avatar -->
                        <ul class="flex-grow-1">
                            <li>
                                <h3>{{ contacts[activeIndex]?.name }}</h3>
                            </li>
                            <li class="text-small text-lightgrey">Ultimo accesso oggi alle 12:00</li>
                        </ul>
                        <!-- Icon header right -->
                        <div class="icons">
                            <i class="fas fa-search mx-2"></i>
                            <i class="fas fa-message mx-2"></i>
                            <i class="fas fa-paperclip mx-2"></i>
                        </div>
                    </header>
                    <!-- Section of chat -->
                    <div class="chat overflow-y-scroll py-4 px-5">
                        <ul v-if="contacts[activeIndex]?.messages" class="p-0 m-0">
                            <!-- Message -->
                            <li v-for="(message, index) in contacts[activeIndex]?.messages" class="my-2">
                                <!-- If sent -->
                                <div :class="message.status === 'sent' ? 'justify-content-end' : ''"
                                    class="row-message d-flex ">
                                    <img v-if="message.status === 'received'" class="img-avatar me-2"
                                        :src="getImagePath(contacts[activeIndex]?.avatar)" alt="Avatar">
                                    <img v-else src="../assets/img/avatar_io.png" alt="Avatar">
                                    <div class="message-chat">
                                        <div :class="message.status" class="message rounded-3 text-md">
                                            {{ message.message }}
                                            <time>
                                                <!-- {{ formatDate(message.date) }} -->
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
                </div>
            </div>
        </div>
    </main>
</template>

<style lang="scss" scoped></style>
