<script setup>
import AppMainContacts from './AppMainContacts.vue';
import AppMainChat from './AppMainChat.vue';
import axios from 'axios';
import { ref } from 'vue';
import { onMounted } from 'vue';


const contacts = ref([]);
const apiUrlContacts = 'http://localhost:8000/api/contacts';

async function getContacts() {
    try {
        const response = await axios.get(apiUrlContacts);
        contacts.value = response.data.results;
        console.log(contacts.value);
    } catch (error) {
        console.error('Errore nel caricamento dei contatti:', error);
    }
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
                <AppMainContacts :contacts="contacts" />
                <!-- Right Column -->
                <AppMainChat :contacts="contacts" />
            </div>
        </div>
    </main>
</template>

<style lang="scss" scoped></style>
