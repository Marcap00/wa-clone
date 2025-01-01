<script setup>
import BaseLogoText from '../general/BaseLogoText.vue'
</script>

<template>
    <section id="hero" class="hero py-5">
        <div class="container h-100">
            <div class="hero-content h-100 d-flex flex-column justify-content-center align-items-center">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <h1 class="mb-1">Welcome to</h1>
                    <BaseLogoText />
                </div>
                <p class="mb-3 text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem,
                    ipsum
                    dolor sit amet
                    consectetur adipisicing elit. Facilis dignissimos perferendis quas, est deserunt aliquid harum
                    ea
                    perspiciatis doloribus molestiae repellat non nisi? Repellendus ipsa neque alias, corporis illo
                    quibusdam.
                </p>
                <div class="d-flex gap-3">
                    <router-link class="btn-custom text-white fw-semibold" to="/login">
                        Login
                    </router-link>
                    <router-link class="btn-custom text-white fw-semibold" to="/register">
                        Register
                    </router-link>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.hero {
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0.721) 100%, transparent), url('../../assets/img/hero.jpg');
    background-size: cover;
    background-position: center;
    color: $text-title;

    p {
        width: 50%;
    }

}
</style>
