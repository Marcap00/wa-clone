<script setup>
import AppMainContacts from './AppMainContacts.vue';
import AppMainChat from './AppMainChat.vue';
import { onMounted } from 'vue';
import { useContactsStore } from '../js/stores/contacts';
import { useRouter } from 'vue-router';

const router = useRouter();
const contactsStore = useContactsStore();

onMounted(() => {
    contactsStore.getContacts(router);
});

</script>

<template>
    <!-- Main -->
    <main class="vh-100">
        <!-- Container -->
        <div class="container-fluid h-100 py-4">
            <!-- Wrapper -->
            <div class="wrapper d-flex h-100">
                <!-- Left Column -->
                <AppMainContacts />
                <!-- Right Column -->
                <AppMainChat />
            </div>
        </div>
    </main>
</template>

<style lang="scss" scoped>
@use "../scss/_variables.scss" as *;

main {
    /* background: linear-gradient(to bottom,
            #009688 15%,
            #dcdbd3 15% 100%); */

    background-color: $bg-body;

    .wrapper>* {
        background-color: #fff;
    }
}
</style>
