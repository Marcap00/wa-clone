<script setup>
import AppMainContactsList from '../contacts/AppMainContactsList.vue';
import { useNewContactStore } from '../../js/stores/newContact';
import { useAuthStore } from '../../js/stores/auth';
import axios from 'axios';
import { ref, computed } from 'vue';

const newContactStore = useNewContactStore();
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
    console.log(dataForm.value);
    console.log(user.value.id);
    try {
        const response = await axios.post('http://localhost:8000/api/contacts', dataForm.value);
        console.log(response);
        successMessage.value = response.data.message;
        errorMessage.value = '';
    } catch (error) {
        console.log(error);
        errorMessage.value = error.response.data.message;
        successMessage.value = '';
    }
}

const errorPhoneNumber = computed(() => {
    return errorMessage.value.includes('phone');
});

const errorName = computed(() => {
    return errorMessage.value.includes('name');
});

</script>

<template>
    <div class="col-new-contact">
        <header class="d-flex align-items-center gap-3 p-3">
            <i @click="closeNewContact" class="fas fa-arrow-left"></i>
            <h5>New Chat</h5>
        </header>
        <div class="content-new-contact">
            <div class="container-fluid">
                <form @submit.prevent="addNewContact" data-bs-theme="dark"
                    class="row justify-content-center align-items-center mb-5">
                    <h5 class="mb-3">Add new contact</h5>
                    <div v-if="successMessage || errorMessage" class="alert w-75"
                        :class="{ 'alert-success': successMessage, 'alert-danger': errorMessage }">
                        {{ successMessage || errorMessage }}
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input type="text" class="form-control focus-none" :class="{ 'is-invalid': errorName }"
                                id="contactName" name="contactName" placeholder="Contact Name" v-model="dataForm.name">
                            <label class="text-white" for="contactName">Contact Name</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" :class="{ 'is-invalid': errorPhoneNumber }"
                                id="phoneNumber" name="phoneNumber" placeholder="Phone Number"
                                v-model="dataForm.phone_number">
                            <label class="text-white" for="phoneNumber">Phone Number</label>
                        </div>
                    </div>
                    <div class="col-4 text-center">
                        <button type="submit" class="btn btn-success w-100 py-3">
                            <span class="me-2 fw-semibold">Add Contact</span>
                            <i class="fas fa-plus text-white fa-lg"></i>
                        </button>
                    </div>
                </form>
                <h5 class="mb-3">Contacts</h5>
                <AppMainContactsList :isNewContact="true" />
            </div>
        </div>
    </div>
</template>


<style lang="scss" scoped>
@use "bootstrap/scss/bootstrap.scss" as *;
@use "../../scss/_variables.scss" as *;

.col-new-contact {
    width: 40%;

    h5 {
        color: $text-title;
    }

    header {
        background-color: $bg-dark-contacts;
        height: 70px;
    }

    input {
        /* background-color: $bg-dark-searchbar !important; */
        /* color: $text-title !important; */


        /* &::placeholder {
            color: $text-title !important;
        } */

        &:focus {
            /* border: 3px solid $text-label-active !important;
            outline: none !important; */
            box-shadow: 0 0 10px 0.25rem $text-label-active !important;

        }

        /* &:active {
            border: 3px solid $text-label-active !important;
        } */
    }

    .content-new-contact {
        background-color: $bg-dark-contacts;
        height: calc(100% - 70px);
        overflow-y: scroll;
    }
}
</style>
