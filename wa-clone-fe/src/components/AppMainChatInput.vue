<script setup>
import { ref } from 'vue';
const newMessage = ref('');

</script>

<template>
    <div class="input-message d-flex  align-items-center p-2">
        <i class="far fa-smile fa-lg mx-3"></i>

        <input v-model="newMessage" name="newMessage" @keyup.enter="addMessage(newMessage, activeIndex)"
            class="flex-grow-1 border-0 rounded-3 ps-3" type="text" placeholder="Scrivi un messaggio">
        <i class="fas fa-microphone mx-3"></i>
    </div>

</template>

<style lang="scss" scoped>
.input-message {
    height: 50px;
    background-color: #f3eeea;
}

.input-message input {
    line-height: 36px;
}
</style>
