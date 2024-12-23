<script setup>
import AppMainChatHeader from './AppMainChatHeader.vue';
import AppMainChatInput from './AppMainChatInput.vue';
import AppMainChatMessagesList from './AppMainChatMessagesList.vue';
import { useContactsStore } from '../js/stores/contacts';
const contactsStore = useContactsStore()

</script>

<template>
    <div class="col-rght">
        <div class="h-100" v-if="contactsStore.contacts.length">
            <!-- Header Right -->
            <AppMainChatHeader />
            <!-- Section of chat -->
            <AppMainChatMessagesList />
            <!-- Input -->
            <AppMainChatInput />

        </div>
        <div v-else class="d-flex justify-content-center align-items-center h-100 background-empty">
            <img src="../assets/img/whatsapp.png" class="img-fluid logo-empty me-2" alt="Chat Empty">
            <h2 class="text-secondary">Aggiungi un contatto per iniziare una chat
                <i class="fa-solid fa-plus text-secondary align-middle mb-1"></i>
            </h2>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.col-rght {
    width: 65%;

    .logo-empty {
        width: 50px;
    }
}

.background-empty {
    background-color: #EAEAEA;
}
</style>
