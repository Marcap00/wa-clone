<script setup>
import AppMainChatHeader from './AppMainChatHeader.vue';
import AppMainChatInput from './AppMainChatInput.vue';
import AppMainChatElement from './AppMainChatElement.vue';

</script>

<template>
    <div class="col-rght">
        <!-- Header Right -->
        <AppMainChatHeader />
        <!-- Section of chat -->
        <AppMainChatElement />
        <!-- Input -->
        <AppMainChatInput />
    </div>

</template>

<style lang="scss" scoped></style>
