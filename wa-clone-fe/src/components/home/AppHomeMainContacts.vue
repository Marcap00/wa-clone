<script setup>
</script>

<template>
    <section id="contacts" class="contacts py-5">
        <div class="container">
            <h2 class="custom-section-title text-center mb-5">
                Contacts👥
            </h2>
            <div class="d-flex align-items-center p-3">
                <img src="https://avatars.githubusercontent.com/u/173565393?v=4" alt=""
                    class="img-fluid m-3 rounded-circle">
                <div class="flex-grow-1 p-3">
                    <a href="https://github.com/Marcap00">
                        <i class="fa-brands fa-github fa-3x mx-3"></i>
                    </a>
                    <a href="www.linkedin.com/in/marco-cappellato-5b83a4322">
                        <i class="fa-brands fa-linkedin fa-3x mx-3"></i>
                    </a>
                    <h2 class="custom-section-title fw-semibold">
                        Marco Cappellato
                    </h2>
                    <h4 class="text-white mb-2">
                        Junior Web Developer
                    </h4>
                    <p class="text-white mb-2">
                        cappellatomarco00@gmail.com
                    </p>
                    <p class="text-white mb-2">
                        Tech Stack:
                        <span class="fw-semibold">
                            HTML, CSS, Bootstrap, JavaScript, Vue.js (Composition API), Pinia, PHP, MySQL, Laravel
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

img {
    width: 300px;
}

.contacts {
    background-color: $bg-dark-contacts-active;

    i:hover {
        color: $color-github-profile;
    }
}
</style>
