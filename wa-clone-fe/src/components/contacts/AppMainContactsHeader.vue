<script setup>
import { useAuthStore } from '../../js/stores/auth';
import { useRouter } from 'vue-router';
import { onMounted } from 'vue';

const authStore = useAuthStore();
const router = useRouter();

const user = localStorage.getItem('user') ? JSON.parse(localStorage.getItem('user')) : authStore.user;

function getImagePath(imagePath) {
    return new URL(`../../assets/img/${imagePath}`, import.meta.url).href;
}

function reload() {
    location.reload();
}

function logout() {
    authStore.logout();
    router.push({ name: 'login' });
}

onMounted(async () => {
    // console.log(authStore.user);
});
</script>

<template>
    <header v-if="user" class="d-flex justify-content-between align-items-center p-3">
        <!-- Avatar -->
        <div class="avatar d-flex align-items-center">
            <!-- Avatar Image -->
            <!-- <img v-if="user.avatar" class="img-avatar me-2" :src="user.avatar" alt="Avatar">
            <img v-else class="img-avatar me-2" :src="user.avatar_placeholder" alt="Avatar"> -->
            <!-- Name Avatar -->
            <!-- <h3>{{ user.name }}</h3> -->
            <h2>Chats</h2>
        </div>
        <!-- Icons Column Left -->
        <div class="icons">
            <i @click="reload()" class="fas fa-circle-notch mx-2"></i>
            <i class="far fa-message mx-2"></i>
            <i @click="logout()" class="fas fa-ellipsis-v mx-2"></i>
        </div>
    </header>

</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

header {
    height: 70px;
    background-color: $bg-dark-contacts;
}

h2 {
    color: #fff;
    font-weight: 700;
}

i {
    cursor: pointer;
    color: $color-icon;
}
</style>
