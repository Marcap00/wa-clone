<script setup>
import { useAuthStore } from '../../js/stores/auth';
import { useRouter } from 'vue-router';
import { onMounted } from 'vue';
import { ref } from 'vue';
const authStore = useAuthStore();
const router = useRouter();

const isDropdownMenuOpen = ref(false);

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
        <div class="icons d-flex align-items-center">
            <i @click="reload()" class="fas fa-circle-notch mx-3" title="Reload"></i>
            <i class="far fa-message mx-3" title="New chat"></i>
            <div class="dropdown-menu" :class="{ 'bg-custom-icon': isDropdownMenuOpen }"
                @click="isDropdownMenuOpen = !isDropdownMenuOpen">
                <i class="fas fa-ellipsis-v" title="Menu"></i>
                <ul class="dropdown-menu-list mt-2" v-if="isDropdownMenuOpen">
                    <li class="d-flex align-items-center gap-2">
                        <p class="text-white">New group</p>
                    </li>
                    <li>
                        <p class="text-white">Starred messages</p>
                    </li>
                    <li @click="logout()">
                        <p class="text-danger">Log out</p>
                    </li>
                </ul>
            </div>
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

.dropdown-menu {
    position: relative;
    height: 40px;
    width: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10000;
}

.dropdown-menu-list {
    position: absolute;
    top: 100%;
    right: 0;
    background-color: $bg-dark-searchbar;
    border-radius: 10px;
    width: 250px;
    z-index: 10000;

    li {
        margin: 5px 0;
        padding: 5px 15px;

        &:hover {
            background-color: $bg-dark-contacts-active;
        }
    }
}

.bg-custom-icon {
    background-color: #bebebe28;
    border-radius: 50%;
}
</style>
