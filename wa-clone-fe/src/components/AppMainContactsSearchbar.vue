<script setup>
import { ref } from 'vue';
const textToFind = ref('');
</script>

<template>
    <div class="search-bar d-flex align-items-center p-2">
        <!-- Icons Search Bar -->
        <i class="fas fa-search bg-white border border-light px-3"></i>
        <!-- Input search -->
        <input v-model="textToFind" name="textToFind" type="text" class="w-100 border border-light p-2"
            placeholder="Cerca o inizia una nuova chat">
    </div>
</template>

<style lang="scss" scoped></style>
