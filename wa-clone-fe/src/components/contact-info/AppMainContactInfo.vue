<script setup>
import BaseLoader from '../general/BaseLoader.vue';
import AppMainContactInfoHeader from './AppMainContactInfoHeader.vue';
import { useContactsStore } from '../../js/stores/contacts';
import { useActiveIndexStore } from '../../js/stores/activeIndex';
import { useContactInfoStore } from '../../js/stores/contactInfo';
import { computed } from 'vue';
const contactsStore = useContactsStore();
const activeIndexStore = useActiveIndexStore();
const contactInfoStore = useContactInfoStore();

const contact = computed(() => {
    // console.log(contactsStore.contacts[activeIndexStore.activeIndex]);
    return contactsStore.contacts[activeIndexStore.activeIndex];
});

contactInfoStore.contact = contact.value;

</script>

<template>
    <div v-if="contact" class="col-info">
        <div class="bg-custom-info h-100">
            <AppMainContactInfoHeader />
            <div class="content-info">
                <BaseLoader v-if="!contact" />
                <div v-if="contact" class="user-info d-flex flex-column align-items-center mb-2">
                    <img :src="contact.avatar" alt="Avatar" class="img-avatar-lg my-3">
                    <div class="info-item text-center mb-3">
                        <h2>{{ contact.name }}</h2>
                        <p>{{ contact.phone_number }}</p>
                    </div>
                </div>
                <div v-if="contact" class="bio p-4 mb-2">
                    <h4 class="mb-2 fw-normal">About</h4>
                    <p class="text-white">{{ contact.biography }}</p>
                </div>
                <div class="messages-info p-4 mb-2">
                    <ul>
                        <li class="d-flex justify-content-between align-items-center mb-4">
                            <span class="d-flex align-items-center gap-2">
                                <span class="custom-size">
                                    <i class="fas fa-star color-icon"></i>
                                </span>
                                <span class="fw-normal text-white">Starred Messages</span>
                            </span>
                            <span>
                                <i class="fas fa-chevron-right color-icon fa-sm"></i>
                            </span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center gap-2">
                                <span class="custom-size">
                                    <i class="fas fa-bookmark color-icon"></i>
                                </span>
                                <span class="fw-normal text-white">Kept Messages</span>
                            </span>
                            <span>
                                <i class="fas fa-chevron-right color-icon fa-sm"></i>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="encryption-info d-flex align-items-center gap-3 px-4 py-3 mb-2">
                    <i class="fas fa-lock color-icon"></i>
                    <div>
                        <h4 class="mb-2 fw-normal text-white">Encryption</h4>
                        <p class="custom-text-secondary">Messages are end-to-end encrypted. Click to verify.</p>
                    </div>
                </div>
                <div class="actions px-4 py-3 mb-3">
                    <ul>
                        <li class="mb-3">
                            <i class="far fa-heart color-icon me-3"></i>
                            <span class="text-white fw-normal">Add to favorites</span>
                        </li>
                        <li class="text-danger mb-3">
                            <i class="fas fa-ban text-danger me-3"></i>
                            <span class="fw-normal">Block {{ contact.name }}</span>
                        </li>
                        <li class="text-danger mb-3">
                            <i class="fas fa-thumbs-down fa-flip-horizontal text-danger me-3"></i>
                            <span class="fw-normal">Report {{ contact.name }}</span>
                        </li>
                        <li class="text-danger">
                            <i class="fas fa-trash text-danger me-3"></i>
                            <span class="fw-normal">Delete Chat</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.col-info {
    width: 30%;

    .bg-custom-info {
        background-color: $bg-custom-info;
    }

    .content-info {
        height: calc(100% - 50px);
        overflow-y: scroll;
    }

    .header-info,
    .user-info,
    .bio,
    .actions,
    .messages-info,
    .encryption-info {
        background-color: $bg-dark-contacts;
    }

    .header-info,
    h2 {
        color: $text-contacts;
    }

    h2 {
        font-weight: 400;
    }

    .header-info {
        height: 50px;
    }

    .user-info {

        .info-item {
            p {
                color: $text-secondary;
            }
        }
    }

    .bio {
        h4 {
            color: $text-secondary;
            /* font-weight: 400; */
        }

        /* p {
            color: #fff;
        } */
    }

    .color-icon {
        color: $color-icon;
    }

    li {
        cursor: pointer;
    }

    .custom-size {
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .custom-text-secondary {
        color: $text-secondary;
    }
}
</style>
