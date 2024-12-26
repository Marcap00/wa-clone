<script setup>
import AppMainChatMessagesListItem from './AppMainChatMessagesListItem.vue';
import { useActiveIndexStore } from '../../js/stores/active_index'
import { useContactsStore } from '../../js/stores/contacts'
import { computed } from 'vue';

const contactsStore = useContactsStore()
const activeIndexStore = useActiveIndexStore()

const activeContact = computed(() => {
    return contactsStore.contacts[activeIndexStore.activeIndex]
})

</script>

<template>
    <div v-if="activeContact" class="chat overflow-y-scroll py-4 px-4">
        <ul v-if="activeContact.messages" class="p-0 m-0">
            <li class="d-flex justify-content-center text-warning mb-3">
                <h6 class="text-center">
                    <i class="fas fa-lock text-warning"></i>
                    Messages are end-to-end encrypted. No one outside of this chat, not even WhatsApp, can read or
                    listen to them. Click to learn more
                </h6>
            </li>
            <AppMainChatMessagesListItem v-for="(message, index) in activeContact.messages" :key="index"
                :message="message" :index="index" />
        </ul>
        <div v-if="activeContact.messages.length == 0" class="d-flex justify-content-center align-items-center h-100">
            <h3>Per iniziare la conversazione, scrivi un messaggio ✍️</h3>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.chat {
    height: calc(100% - 100px);
    background-image: url('../../assets/img/mine-dark.jpg');
    background-size: contain;

}

h3 {
    color: $text-contacts;
}

h6 {
    background-color: #8b8b8b7c;
    padding: 10px 15px;
    border-radius: 10px;
    width: 50%;
    cursor: pointer;

    &:hover {
        text-decoration: underline;
    }
}
</style>
