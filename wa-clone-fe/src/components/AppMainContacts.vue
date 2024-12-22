<script setup>
import AppMainContactsHeader from './AppMainContactsHeader.vue';
import AppMainContactsDesktopAlerts from './AppMainContactsDesktopAlerts.vue';
import AppMainContactsSearchbar from './AppMainContactsSearchbar.vue';
import { ref } from 'vue';
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
    <div class="col-lft">
        <!-- Top Col Left -->
        <div class="col-lft-top sticky">
            <!-- Left Header -->
            <AppMainContactsHeader />
            <!-- Section desktop alerts -->
            <AppMainContactsDesktopAlerts />
            <!-- Section Search Bar -->
            <AppMainContactsSearchbar />
        </div>
        <!-- Section contacts list -->
        <div class="contacts-list overflow-y-scroll">
            <!-- Contacts List -->
            <ul class="p-0 m-0">
                <!-- Contact -->
                <li v-for="(contact, i) in contacts" @click="setActiveContact(i)"
                    :class="i === activeIndex ? 'active' : '', !contact.visible ? 'd-none' : ''"
                    class="d-flex align-items-center p-2">
                    <img class="img-avatar me-2" :src="getImagePath(contact.avatar)" alt="#">
                    <ul class="flex-grow-1">
                        <li>
                            <h3> {{ contact.name }} </h3>
                        </li>
                        <li class="text-small text-lightgrey">Ultimo messaggio inviato</li>
                    </ul>
                    <time>
                        <!-- {{ formatDate(contact.messages[lastMessageIndex(i)].date) }} -->
                        13:04
                    </time>
                </li>
            </ul>
        </div>
    </div>
</template>

<style lang="scss" scoped></style>
