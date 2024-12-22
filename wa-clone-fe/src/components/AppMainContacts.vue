<script setup>
import AppMainContactsHeader from './AppMainContactsHeader.vue';
import AppMainContactsDesktopAlerts from './AppMainContactsDesktopAlerts.vue';
import AppMainContactsSearchbar from './AppMainContactsSearchbar.vue';
import AppMainContactsList from './AppMainContactsList.vue';
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
        <AppMainContactsList :contacts="contacts" :activeIndex="activeIndex" />
    </div>
</template>

<style lang="scss" scoped></style>
