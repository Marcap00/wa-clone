<script setup>
import AppMainChatHeader from './AppMainChatHeader.vue';
import AppMainChatInput from './AppMainChatInput.vue';
import AppMainChatMessagesList from './AppMainChatMessagesList.vue';
import AppMainChatEmpty from './AppMainChatEmpty.vue';
import { useContactsStore } from '../../js/stores/contacts';
import { useContactInfoStore } from '../../js/stores/contactInfo';
import { useNewContactStore } from '../../js/stores/newContact';
const contactsStore = useContactsStore()
const contactInfoStore = useContactInfoStore()
const newContactStore = useNewContactStore()

</script>

<template>
    <div class="col-rght" :class="{ 'info-displayed': contactInfoStore.contactInfo }">
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

    &.info-displayed {
        width: 35%;
    }
}
</style>
