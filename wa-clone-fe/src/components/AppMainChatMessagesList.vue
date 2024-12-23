<script setup>
import AppMainChatMessagesListItem from './AppMainChatMessagesListItem.vue';
import { useActiveIndexStore } from '../js/stores/active_index'
import { useContactsStore } from '../js/stores/contacts'

const contactsStore = useContactsStore()
const activeIndexStore = useActiveIndexStore()

</script>

<template>
    <div v-if="contactsStore.contacts[activeIndexStore.activeIndex]" class="chat overflow-y-scroll py-4 px-5">
        <ul v-if="contactsStore.contacts[activeIndexStore.activeIndex].messages" class="p-0 m-0">
            <AppMainChatMessagesListItem
                v-for="(message, index) in contactsStore.contacts[activeIndexStore.activeIndex].messages" :key="index"
                :message="message" />
        </ul>
        <div v-if="contactsStore.contacts[activeIndexStore.activeIndex].messages.length == 0"
            class="d-flex justify-content-center align-items-center h-100">
            <h3>Per iniziare la conversazione, scrivi un messaggio ✍️</h3>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.chat {
    height: calc(100% - 100px);
    background-image: url('../assets/img/mine.png');
}
</style>
