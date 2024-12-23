<script setup>
import AppHeader from '../components/general/AppHeader.vue'
import AppFooter from '../components/general/AppFooter.vue'
import { useAuthStore } from '../js/stores/auth'
import { ref } from 'vue'

const authStore = useAuthStore()

const form = ref({
    name: '',
    email: '',
    password: '',
    phone_number: '',
    biography: '',
    avatar: '',
})

const errorMessage = ref('')
const successMessage = ref('')

const register = async () => {
    try {
        console.log(form.value)
        const response = await authStore.register(form.value)
        successMessage.value = "Registrazione effettuata con successo"
        /* setTimeout(() => {
            router.push('/login');
        }, 1000); */
        console.log(response)
    } catch (error) {
        errorMessage.value = error.response?.data?.message || error.message
    }
}

const handleAvatarChange = (event) => {
    form.avatar = event.target.files[0]
}


</script>

<template>
    <AppHeader />
    <main class="h-main">
        <div class="container">
            <div class="title">
                <h1>Register</h1>
            </div>
            <form class="row" @submit.prevent="register" enctype="multipart/form-data">
                <div class="col-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" v-model="form.name" required
                        autocomplete="name">
                </div>

                <div class="col-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" v-model="form.email" required
                        autocomplete="email">
                </div>

                <div class="col-6 mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" v-model="form.password"
                        required autocomplete="current-password">
                </div>

                <div class="col-6 mb-3">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                        v-model="form.phone_number" required>
                </div>

                <div class="col-6 mb-3">
                    <label for="biography">Biography</label>
                    <textarea class="form-control" id="biography" name="biography" v-model="form.biography"></textarea>
                </div>

                <div class="col-6 mb-3">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" @change="handleAvatarChange">
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary me-2">Register</button>
                    <button type="reset" class="btn btn-secondary me-2">Cancel</button>
                    <p>Already have an account? <a href="/login">Login</a></p>
                </div>
            </form>
        </div>
    </main>
    <AppFooter />
</template>

<style lang="scss" scoped>
@use "bootstrap/scss/bootstrap.scss" as *;
</style>
