<script setup>
import { useContactInfoStore } from '../../js/stores/contactInfo';
const contactInfoStore = useContactInfoStore();
const closeContactInfo = () => {
    contactInfoStore.contactInfo = false;
};
</script>

<template>
    <div class="header-info d-flex align-items-center gap-3 px-3 py-3">
        <i class="fas fa-xmark fa-lg" @click="closeContactInfo"></i>
        <h3>Contact Info</h3>
    </div>
</template>

<style scoped></style>
