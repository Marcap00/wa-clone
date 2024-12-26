<script setup>
import AppMainChatHeader from './AppMainChatHeader.vue';
import AppMainChatInput from './AppMainChatInput.vue';
import AppMainChatMessagesList from './AppMainChatMessagesList.vue';
import AppMainChatEmpty from './AppMainChatEmpty.vue';
import { useContactsStore } from '../../js/stores/contacts';
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
        <AppMainChatEmpty v-else />
    </div>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.col-rght {
    width: 65%;

    .logo-empty {
        width: 50px;
    }
}

.background-empty {
    background-color: $bg-dark-chat;
}

h1 {
    color: $text-title;
}

p {
    color: $text-secondary;
}
</style>
