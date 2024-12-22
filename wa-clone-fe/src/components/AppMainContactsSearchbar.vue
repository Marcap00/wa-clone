<script setup>
import { useContactsStore } from '../js/stores/contacts';
import { onBeforeUpdate, onMounted } from 'vue';
const contactsStore = useContactsStore();

onBeforeUpdate(() => {
    console.log(contactsStore.textToFind);
    contactsStore.searchContacts();
});
</script>

<template>
    <div class="search-bar d-flex align-items-center p-2">
        <!-- Icons Search Bar -->
        <i class="fas fa-search bg-white border border-light px-3"></i>
        <!-- Input search -->
        <input v-model="contactsStore.textToFind" name="textToFind" type="text" class="w-100 border border-light p-2"
            placeholder="Cerca o inizia una nuova chat">
    </div>
</template>

<style lang="scss" scoped>
.search-bar {
    height: 40px;
    background-color: #f9f9f9;
}

.search-bar i.fa-search {
    border-radius: 5px 0px 0px 5px;
    font-size: .75em;
    line-height: 32px;
}

.search-bar input {
    border-radius: 0px 5px 5px 0px;
}

.search-bar input::placeholder {
    font-size: 12px;
}
</style>
