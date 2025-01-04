<script setup>
import AppMainContactsHeader from './AppMainContactsHeader.vue';
import AppMainContactsDesktopAlerts from './AppMainContactsDesktopAlerts.vue';
import AppMainContactsSearchbar from './AppMainContactsSearchbar.vue';
import AppMainContactsList from './AppMainContactsList.vue';
import AppMainContactsFilterLabels from './AppMainContactsFilterLabels.vue';
import BaseLoader from '../general/BaseLoader.vue';
import { useContactsStore } from '../../js/stores/contacts';

const contactsStore = useContactsStore()
</script>

<template>
    <div class="col-lft">
        <!-- Top Col Left -->
        <div class="col-lft-top sticky">
            <!-- Left Header -->
            <AppMainContactsHeader />
            <!-- Section Search Bar -->
            <AppMainContactsSearchbar />
            <!-- Section Filter Labels -->
            <AppMainContactsFilterLabels />
            <!-- Section desktop alerts -->
            <AppMainContactsDesktopAlerts />
        </div>
        <BaseLoader v-if="!contactsStore.contacts.length" />
        <!-- Section contacts list -->
        <AppMainContactsList v-else :isNewContact="false" />
    </div>
</template>

<style lang="scss" scoped>
.col-lft {
    width: 30%;
}

.col-lft-top {
    position: relative;
    z-index: 1000;
}
</style>
