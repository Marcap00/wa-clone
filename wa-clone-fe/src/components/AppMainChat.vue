<script setup>
import AppMainChatHeader from './AppMainChatHeader.vue';
import AppMainChatInput from './AppMainChatInput.vue';
import AppMainChatMessagesList from './AppMainChatMessagesList.vue';

</script>

<template>
    <div class="col-rght">
        <!-- Header Right -->
        <AppMainChatHeader />
        <!-- Section of chat -->
        <AppMainChatMessagesList />
        <!-- Input -->
        <AppMainChatInput />
    </div>

</template>

<style lang="scss" scoped></style>
