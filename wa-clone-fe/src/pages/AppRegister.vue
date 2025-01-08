<script setup>
import BaseLoaderSpinner from '../components/general/BaseLoaderSpinner.vue';
import { useAuthStore } from '../js/stores/auth'
import { ref, computed, nextTick } from 'vue'
import { useRouter } from 'vue-router'
import { Toast } from 'bootstrap';
const router = useRouter()
const authStore = useAuthStore()
const isLoading = ref(false)
const form = ref({
    name: '',
    email: '',
    password: '',
    phone_number: '',
    biography: '',
    avatar: null,
})

const errorMessage = ref('')
const successMessage = ref('')

const register = async () => {
    try {
        isLoading.value = true
        console.log(form.value)
        const response = await authStore.register(form.value)
        successMessage.value = "Registration made successfully!"
        nextTick(() => {
            const toast = document.querySelector('.toast')
            const toastInstance = new Toast(toast)
            toastInstance.show()
        })
        setTimeout(() => {
            router.push('/login');
        }, 1000);
        // console.log(response)
    } catch (error) {
        errorMessage.value = error.response?.data?.message || error.message || "Error during registration"
        nextTick(() => {
            const toast = document.querySelector('.toast')
            const toastInstance = new Toast(toast)
            toastInstance.show()
        })
    }
}

const handleAvatarChange = (event) => {
    const file = event.target.files[0]
    if (file) {
        form.value.avatar = file
    } else {
        form.value.avatar = null
    }
}

const errorName = computed(() => {
    return errorMessage.value.includes('name');
});

const errorEmail = computed(() => {
    return errorMessage.value.includes('email');
});

const errorPassword = computed(() => {
    return errorMessage.value.includes('password');
});

const errorPhoneNumber = computed(() => {
    return errorMessage.value.includes('phone');
});

const errorBiography = computed(() => {
    return errorMessage.value.includes('biography');
});

const errorAvatar = computed(() => {
    return errorMessage.value.includes('avatar');
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
    <main class="h-main overflow-y-scroll p-4">
        <div class="container">
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
            <!-- <div class="alert alert-success" v-if="successMessage">
                {{ successMessage }}
            </div>
            <div class="alert alert-danger" v-if="errorMessage">
                {{ errorMessage }}
            </div> -->
            <div class="title">
                <h1 class="my-3">Registrati</h1>
            </div>
            <form class="row justify-content-center" @submit.prevent="register" enctype="multipart/form-data">
                <div data-bs-theme="dark" class="col-12 d-flex justify-content-center mb-3 p-0">
                    <div class="w-50">
                        <label class="custom-label" for="avatar">Avatar</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" @change="handleAvatarChange"
                            accept="image/*">
                        <div v-if="form.avatar" class="mt-2">
                            File selezionato: {{ form.avatar.name }}
                        </div>
                        <p class="text-lightgrey fst-italic mb-0">* Max file size 2MB</p>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <div data-bs-theme="dark" class="form-floating col-4 mb-3 me-4 p-0">
                        <input type="text" class="form-control" :class="{ 'is-invalid': errorName }" id="name"
                            name="name" v-model="form.name" required autocomplete="off">
                        <label for="name">Name*</label>
                        <div class="col-6 text-helper fst-italic text-lightgrey mt-1">
                            <p class="mb-0">* Name is required</p>
                        </div>
                    </div>

                    <div data-bs-theme="dark" class="form-floating col-4 mb-3 p-0">
                        <input type="email" class="form-control" :class="{ 'is-invalid': errorEmail }" id="email"
                            name="email" v-model="form.email" required autocomplete="off">
                        <label for="email">Email*</label>
                        <div class="col-6 text-helper fst-italic text-lightgrey mt-1">
                            <p class="mb-0">* Email is required</p>
                            <p class="mb-0">* Email required an @</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <div data-bs-theme="dark" class="col-4 form-floating mb-3 me-4 p-0">
                        <input type="password" class="form-control" :class="{ 'is-invalid': errorPassword }"
                            id="password" name="password" v-model="form.password" required autocomplete="off">
                        <label for="password">Password*</label>
                        <div class="col-6 text-helper fst-italic text-lightgrey mt-1">
                            <p class="mb-0">* Password is required</p>
                        </div>
                    </div>

                    <div data-bs-theme="dark" class="col-4 form-floating mb-3 p-0">
                        <input type="text" class="form-control" :class="{ 'is-invalid': errorPhoneNumber }"
                            id="phone_number" name="phone_number" v-model="form.phone_number" required>
                        <label for="phone_number">Phone Number*</label>
                        <div class="col-6 text-helper fst-italic text-lightgrey mt-1">
                            <p class="mb-0">* Phone number is required</p>
                        </div>
                    </div>
                </div>
                <div data-bs-theme="dark" class="col-6 form-floating mb-4 p-0">
                    <textarea class="form-control" :class="{ 'is-invalid': errorBiography }" id="biography"
                        name="biography" v-model="form.biography" style="height: 100px"></textarea>
                    <label for="biography">Biography</label>
                </div>

                <div class="col-12 d-flex justify-content-center mb-3">
                    <button id="btn-register" type="submit" class="btn-custom me-3" :class="{ 'disabled': isLoading }"
                        :disabled="isLoading">
                        <BaseLoaderSpinner v-if="isLoading" />
                        <span v-else>Register</span>
                    </button>
                    <button type="reset" class="btn-custom me-2" :disabled="isLoading">
                        <span>Reset</span>
                    </button>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <p>Already have an account? <a href="/login">Login</a></p>
                </div>
            </form>
        </div>
    </main>
</template>

<style lang="scss" scoped>
@use "bootstrap/scss/bootstrap.scss" as *;
@import '../scss/_variables.scss';

h1 {
    text-align: center;
    color: $text-label-active;
}

label,
p {
    color: $text-title;
}

p>a {
    color: $text-label-active;
}

.custom-label {
    color: #9DA0A4;
    background-color: #212529;
    border-radius: 10px;
    padding: 2px 7px;
    font-size: 14px;
    margin-bottom: 5px;
}

form {
    background-color: $bg-dark-contacts;
    border: 3px solid $text-label-active;
    box-shadow: 0 0 10px 0.25rem $text-label-active;
    border-radius: 20px;
    padding: 20px;
}

main {
    background-color: $bg-dark-searchbar;
}

.btn-custom {
    padding: 10px 20px;
    border-radius: 10px !important;
    background-color: $bg-label-active !important;
    border: 3px solid $text-label-active !important;

    &:hover {
        background-color: $bg-label-active-hover !important;
        scale: 1.05 !important;
        transition: all 0.3s ease !important;
    }

    &:active {
        scale: 1 !important;
    }
}

input {
    &:focus {
        box-shadow: 0 0 10px 0.25rem $text-label-active !important;
    }
}

input:focus~.text-helper {
    display: block;
}

textarea {
    &:focus {
        box-shadow: 0 0 10px 0.25rem $text-label-active !important;
    }
}

.toast {
    position: fixed;
    top: 80px;
    right: 10px;
    z-index: 1000;
}

button#btn-register.disabled {
    cursor: not-allowed !important;
    opacity: 0.5 !important;
}
</style>
