<script setup>
import AppMainChatHeader from './AppMainChatHeader.vue';
import AppMainChatInput from './AppMainChatInput.vue';
import AppMainChatElement from './AppMainChatElement.vue';

const props = defineProps({
    contacts: {
        type: Array,
        required: true
    },
});

</script>

<template>
    <div class="col-rght">
        <!-- Header Right -->
        <AppMainChatHeader :contacts="contacts" />
        <!-- Section of chat -->
        <AppMainChatElement :contacts="contacts" />
        <!-- Input -->
        <AppMainChatInput />
    </div>

</template>

<style lang="scss" scoped></style>
