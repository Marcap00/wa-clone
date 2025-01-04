<script setup>
import AppMainContactsList from '../contacts/AppMainContactsList.vue';
import BaseLogo from '../general/BaseLogo.vue';
import BaseLoader from '../general/BaseLoader.vue';
import { useNewContactStore } from '../../js/stores/newContact';
import { useContactsStore } from '../../js/stores/contacts';
import { useAuthStore } from '../../js/stores/auth';
import axios from 'axios';
import { ref, computed, nextTick } from 'vue';
import { Toast } from 'bootstrap';

const newContactStore = useNewContactStore();
const contactsStore = useContactsStore();
const authStore = useAuthStore();
const user = ref(localStorage.getItem('user') ? JSON.parse(localStorage.getItem('user')) : authStore.user);
const dataForm = ref({
    name: '',
    phone_number: '',
    user_id: user.value.id
});
const successMessage = ref('');
const errorMessage = ref('');

function closeNewContact() {
    newContactStore.newContactDisplayed = false;
}

async function addNewContact() {
    /* console.log(dataForm.value);
    console.log(user.value.id); */
    try {
        const response = await axios.post('http://localhost:8000/api/contacts', dataForm.value);
        console.log(response);
        contactsStore.getContacts();
        if (errorMessage.value) {
            errorMessage.value = '';
        }
        console.log(response.data.message);
        successMessage.value = response.data.message;
        nextTick(() => {
            const toast = document.querySelector('.toast')
            const toastInstance = new Toast(toast)
            toastInstance.show()
        })
        dataForm.value = {
            name: '',
            phone_number: '',
            user_id: user.value.id
        }
    } catch (error) {
        console.log(error);
        successMessage.value = '';
        errorMessage.value = error.response.data.message;
        nextTick(() => {
            const toast = document.querySelector('.toast')
            const toastInstance = new Toast(toast)
            toastInstance.show()
        })
    }
}

const errorPhoneNumber = computed(() => {
    if (errorMessage.value) {
        return errorMessage.value.includes('phone');
    }
});

const errorName = computed(() => {
    if (errorMessage.value) {
        return errorMessage.value.includes('name');
    }
});

const successOrErrorMessage = computed(() => {
    if (successMessage.value) {
        errorMessage.value = false
        return successMessage.value
    } else if (errorMessage.value) {
        successMessage.value = false
        return errorMessage.value
    }
})

const now = computed(() => {
    return new Date().toLocaleString('it-IT', { hour: '2-digit', minute: '2-digit' })
})

</script>

<template>
    <div class="col-new-contact">
        <header class="d-flex align-items-center gap-3 p-3">
            <i @click="closeNewContact" class="fas fa-arrow-left"></i>
            <BaseLogo />
            <h5 class="mb-0">New Chat</h5>
        </header>
        <div class="content-new-contact">
            <div class="container-fluid">
                <div v-if="successOrErrorMessage" class="toast"
                    :class="{ 'text-bg-success': successMessage, 'text-bg-danger': errorMessage }" role="alert"
                    aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <!-- <img src="..." class="rounded me-2" alt="..."> -->
                        <strong v-if="successMessage" class="me-auto">Success!</strong>
                        <strong v-else class="me-auto">Error!</strong>
                        <small class="fw-bold">{{ now }}</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-white fw-semibold">
                        {{ successOrErrorMessage }}!
                    </div>
                </div>
                <h5 class="mb-3">Add new contact</h5>
                <form @submit.prevent="addNewContact" data-bs-theme="dark" class="row row-cols-1 mb-3">
                    <div class="col mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control focus-none" :class="{ 'is-invalid': errorName }"
                                id="contactName" name="contactName" placeholder="Contact Name" v-model="dataForm.name">
                            <label class="text-white" for="contactName">Contact Name*</label>
                            <div class="col text-helper fst-italic text-lightgrey mt-1">
                                <p class="mb-0">* Contact name is required</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" :class="{ 'is-invalid': errorPhoneNumber }"
                                id="phoneNumber" name="phoneNumber" placeholder="Phone Number"
                                v-model="dataForm.phone_number">
                            <label class="text-white" for="phoneNumber">Phone Number*</label>
                            <div class="col text-helper fst-italic text-lightgrey mt-1">
                                <p class="mb-0">* Phone number is required</p>
                            </div>
                        </div>
                    </div>
                    <div class="col text-center mb-3">
                        <button type="submit" class="btn btn-success w-100 py-3">
                            <span class="me-2 fw-semibold">Add Contact</span>
                            <i class="fas fa-plus text-white fa-lg"></i>
                        </button>
                    </div>
                </form>
                <h5 class="mb-2">Contacts</h5>
            </div>
            <BaseLoader v-if="!contactsStore.contacts.length" />
            <AppMainContactsList v-else :isNewContact="true" />
        </div>
    </div>
</template>


<style lang="scss" scoped>
@use "bootstrap/scss/bootstrap.scss" as *;
@use "../../scss/_variables.scss" as *;

.col-new-contact {
    width: 30%;

    h5 {
        color: $text-title;
    }

    header {
        background-color: $bg-dark-contacts;
        height: 70px;
    }

    input {
        &:focus {
            box-shadow: 0 0 10px 0.25rem $text-label-active !important;
        }
    }

    input:focus~.text-helper {
        display: block;
    }

    .content-new-contact {
        background-color: $bg-dark-contacts;
        height: calc(100% - 70px);
        overflow-y: hidden;
    }

    .toast {
        position: fixed;
        top: 30px;
        left: 20%;
        z-index: 10000;
    }
}
</style>
