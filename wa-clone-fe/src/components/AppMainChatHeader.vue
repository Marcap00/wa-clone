<script setup>
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
function getImagePath(imagePath) {
    return new URL(`../assets/img/${imagePath}`, import.meta.url).href;
}
</script>

<template>

    <header v-if="contacts.length" class="sticky d-flex align-items-center p-2">
        <img class="img-avatar me-2" :src="getImagePath(contacts[activeIndex]?.avatar)" alt="Avatar utente">
        <!-- Information avatar -->
        <ul class="flex-grow-1">
            <li>
                <h3>{{ contacts[activeIndex]?.name }}</h3>
            </li>
            <li class="text-small text-lightgrey">Ultimo accesso oggi alle 12:00</li>
        </ul>
        <!-- Icon header right -->
        <div class="icons">
            <i class="fas fa-search mx-2"></i>
            <i class="fas fa-message mx-2"></i>
            <i class="fas fa-paperclip mx-2"></i>
        </div>
    </header>

</template>

<style lang="scss" scoped></style>
