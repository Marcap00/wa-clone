<script setup>
import AppMainSidebar from './sidebar/AppMainSidebar.vue';
import AppMainContacts from './contacts/AppMainContacts.vue';
import AppMainChat from './chat/AppMainChat.vue';
import AppMainContactInfo from './contact-info/AppMainContactInfo.vue';
import AppMainNewContact from './new-contact/AppMainNewContact.vue';
import AppMainSettings from './settings/AppMainSettings.vue';
import AppMainMessageInfo from './message-info/AppMainMessageInfo.vue';
import { onMounted } from 'vue';
import { useContactsStore } from '../js/stores/contacts';
import { useContactInfoStore } from '../js/stores/contactInfo';
import { useNewContactStore } from '../js/stores/newContact';
import { useSettingsStore } from '../js/stores/settings';
import { useMessageInfoStore } from '../js/stores/messageInfo';
import { useRouter } from 'vue-router';

const router = useRouter();
const messageInfoStore = useMessageInfoStore();
const settingsStore = useSettingsStore();
const contactsStore = useContactsStore();
const contactInfoStore = useContactInfoStore();
const newContactStore = useNewContactStore();
onMounted(() => {
    contactsStore.getContacts(router);
});

</script>

<template>
    <!-- Main -->
    <main class="vh-100">
        <!-- Container -->
        <div class="container-fluid h-100 py-4">
            <!-- Wrapper -->
            <div class="wrapper d-flex h-100">
                <!-- Sidebar -->
                <AppMainSidebar />
                <!-- Left Column -->
                <AppMainContacts v-if="!newContactStore.newContactDisplayed && !settingsStore.showSettings" />
                <AppMainNewContact v-else-if="newContactStore.newContactDisplayed" />
                <AppMainSettings v-else-if="settingsStore.showSettings" />
                <!-- Right Column -->
                <AppMainChat />
                <!-- Contact Info -->
                <AppMainContactInfo v-if="contactInfoStore.contactInfo" />
                <!-- Message Info -->
                <AppMainMessageInfo v-if="messageInfoStore.showMessageInfo" />
            </div>
        </div>
    </main>
</template>

<style lang="scss" scoped>
@use "../scss/_variables.scss" as *;

main {
    /* background: linear-gradient(to bottom,
            #009688 15%,
            #dcdbd3 15% 100%); */

    background-color: $bg-body;
    /* .wrapper>* {
        background-color: #fff;
    } */

    /* .wrapper {
        box-shadow: 0 0 10px 0.25rem $text-label-active !important;
    } */
}
</style>
