<script setup>
import AppMainChatHeader from './AppMainChatHeader.vue';
import AppMainChatInput from './AppMainChatInput.vue';
import AppMainChatMessagesList from './AppMainChatMessagesList.vue';
import AppMainChatContactEmpty from './AppMainChatContactEmpty.vue';
import { useContactsStore } from '../../js/stores/contacts';
import { useContactInfoStore } from '../../js/stores/contactInfo';
import { computed } from 'vue';

const contactsStore = useContactsStore()
const contactInfoStore = useContactInfoStore()

const isContactEmpty = computed(() => {
    if (!contactsStore.contacts.length) {
        return false
    }
    if (contactsStore.closeChat) {
        return false
    }
    return true
})

</script>

<template>
    <div class="col-rght" :class="{ 'info-displayed': contactInfoStore.contactInfo }">
        <div class="h-100" v-if="isContactEmpty">
            <!-- Header Right -->
            <AppMainChatHeader />
            <!-- Section of chat -->
            <AppMainChatMessagesList />
            <!-- Input -->
            <AppMainChatInput />
            <!-- Message Info -->
        </div>
        <AppMainChatContactEmpty v-if="!isContactEmpty" />
    </div>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.col-rght {
    /* width: 65%; */
    width: 100%;
    flex-grow: 1;

    &.info-displayed {
        width: 35%;
    }
}
</style>
