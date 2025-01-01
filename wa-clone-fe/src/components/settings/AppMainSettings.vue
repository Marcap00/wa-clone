<script setup>
import { useSettingsStore } from '../../js/stores/settings'
import { useAuthStore } from '../../js/stores/auth'
import BaseLogo from '../general/BaseLogo.vue'
import { computed } from 'vue'
import { useRouter } from 'vue-router'

const settingsStore = useSettingsStore()
const authStore = useAuthStore()
const router = useRouter()

const user = computed(() => localStorage.getItem('user') ? JSON.parse(localStorage.getItem('user')) : authStore.user)

const closeSettings = () => {
    settingsStore.showSettings = false
}

const logout = () => {
    authStore.logout()
    router.push({ name: 'home' });
}
</script>

<template>
    <div class="col-settings">
        <header class="d-flex align-items-center gap-3 p-3">
            <i @click="closeSettings" class="fas fa-arrow-left"></i>
            <BaseLogo />
            <h5>Settings</h5>
        </header>

        <div class="content-settings">
            <div class="user-info d-flex align-items-center gap-3 p-3">
                <img :src="user.avatar_placeholder" alt="User Profile Picture" class="img-avatar-lg flex-shrink-0">
                <div class="user-info-text p-3">
                    <h5>{{ user.name }}</h5>
                    <p class="phone-number mb-2">{{ user.phone_number }}</p>
                    <p>{{ user.biography }}</p>
                </div>

            </div>
            <ul class="list-unstyled">
                <li class="d-flex align-items-center gap-3">
                    <i class="far fa-user fa-lg"></i>
                    <span>Account</span>
                </li>
                <li class="d-flex align-items-center gap-3">
                    <i class="far fa-message fa-lg"></i>
                    <span>Chats</span>
                </li>
                <li @click="logout" class="d-flex align-items-center gap-3 text-danger">
                    <i class="fas fa-sign-out-alt fa-lg text-danger"></i>
                    <span>Log out</span>
                </li>
            </ul>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.col-settings {
    width: 30%;
    background-color: $bg-dark-contacts;

    header {
        height: 70px;

        i {
            cursor: pointer;
            color: $color-icon;
        }

        h5 {
            color: $text-title;
            font-size: 1.2rem;
            font-weight: 500;
        }
    }

    .user-info:hover {
        background-color: $bg-dark-contacts-hover;
        cursor: pointer;
    }

    .user-info-text {
        h5 {
            color: $text-title;
            font-size: 1.2rem;
            font-weight: 500;
        }

        p {
            color: $text-secondary;
        }

        .phone-number {
            color: $text-title;
        }
    }

    ul {
        li {
            color: $text-title;
            cursor: pointer;
            padding: 20px 0 20px 20px;

            i {
                margin-bottom: 20px;
            }

            span {
                font-size: 1.2rem;
                font-weight: 500;
                width: 100%;
                padding-bottom: 20px;
                border-bottom: 1px solid $bg-dark-contacts-active;
            }

            &:hover {
                background-color: $bg-dark-contacts-hover;

                span {
                    border-bottom: 1px solid $text-last-message-received;
                    color: $text-last-message-received;
                }

                i,
                i.fa-sign-out-alt {
                    color: $text-last-message-received !important;
                }
            }
        }
    }
}
</style>
