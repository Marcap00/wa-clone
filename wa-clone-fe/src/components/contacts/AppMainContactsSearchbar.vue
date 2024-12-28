<script setup>
import { useContactsStore } from '../../js/stores/contacts';
import { onBeforeUpdate, onMounted } from 'vue';
const contactsStore = useContactsStore();

onBeforeUpdate(() => {
    // console.log(contactsStore.textToFind);
    contactsStore.searchContacts();
});
</script>

<template>
    <div class="search-bar d-flex align-items-center p-2">
        <!-- Icons Search Bar -->
        <i class="fas fa-search px-3"></i>
        <!-- Input search -->
        <input v-model="contactsStore.textToFind" name="textToFind" type="text" class="w-100 border border-light p-2"
            placeholder="Search">
    </div>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.search-bar {
    height: 40px;
    background-color: $bg-dark-contacts;
}

.search-bar i.fa-search {
    border-radius: 10px 0px 0px 10px;
    font-size: .75em;
    line-height: 37px;
    background-color: $bg-dark-searchbar;
    color: $text-secondary;
    border: 1px solid $bg-dark-searchbar !important;
}

.search-bar input {
    border-radius: 0px 10px 10px 0px;
    background-color: $bg-dark-searchbar;
    border: 1px solid $bg-dark-searchbar !important;
    color: $text-contacts;
    font-size: 16px;
}

.search-bar input::placeholder {
    color: $text-secondary;
    font-size: 16px;
}
</style>
