<script setup>
import AppMainContacts from './AppMainContacts.vue';
import AppMainChat from './AppMainChat.vue';
import { onMounted } from 'vue';
import { useContactsStore } from '../js/stores/contacts';

const contactsStore = useContactsStore();

onMounted(async () => {
    await contactsStore.getContacts();
});

</script>

<template>
    <!-- Main -->
    <main class="vh-100">
        <!-- Container -->
        <div class="container h-100 py-4">
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
main {
    background: linear-gradient(to bottom,
            #009688 15%,
            #dcdbd3 15% 100%);

    .wrapper>* {
        background-color: #fff;
    }
}
</style>
