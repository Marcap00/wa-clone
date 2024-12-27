<script setup>
import AppMainContactsHeader from './AppMainContactsHeader.vue';
import AppMainContactsDesktopAlerts from './AppMainContactsDesktopAlerts.vue';
import AppMainContactsSearchbar from './AppMainContactsSearchbar.vue';
import AppMainContactsList from './AppMainContactsList.vue';


</script>

<template>
    <div class="col-lft">
        <!-- Top Col Left -->
        <div class="col-lft-top sticky">
            <!-- Left Header -->
            <AppMainContactsHeader />
            <!-- Section Search Bar -->
            <AppMainContactsSearchbar />
            <!-- Section desktop alerts -->
            <AppMainContactsDesktopAlerts />
        </div>
        <!-- Section contacts list -->
        <AppMainContactsList />
    </div>
</template>

<style lang="scss" scoped>
.col-lft {
    width: 30%;
}
</style>
