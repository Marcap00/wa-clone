<script setup>
import { ref } from 'vue';
import AppMainChatHeader from './AppMainChatHeader.vue';
import AppMainChatInput from './AppMainChatInput.vue';
import AppMainChatElement from './AppMainChatElement.vue';

const props = defineProps({
    contacts: {
        type: Array,
        required: true
    },
    activeIndex: {
        type: Number,
        required: true
    }
});

</script>

<template>
    <div class="col-rght">
        <!-- Header Right -->
        <AppMainChatHeader :contacts="contacts" :activeIndex="activeIndex" />
        <!-- Section of chat -->
        <AppMainChatElement :contacts="contacts" :activeIndex="activeIndex" />
        <!-- Input -->
        <AppMainChatInput />
    </div>

</template>

<style lang="scss" scoped></style>
