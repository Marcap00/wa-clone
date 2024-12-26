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
    <div v-if="activeContact" class="chat overflow-y-scroll py-4 px-5">
        <ul v-if="activeContact.messages" class="p-0 m-0">
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
</style>
