<script setup>
import BaseLogoXL from '../general/BaseLogoXL.vue'
</script>

<template>
    <section id="services" class="services py-5">
        <div class="container">
            <h2 class="custom-section-title text-center my-5">
                Services🧾
            </h2>
            <div class="row">
                <div class="col-5 d-flex justify-content-center align-items-center py-4">
                    <BaseLogoXL />
                </div>
                <div class="col-7">
                    <div class="services-list p-3">
                        <ul>
                            <li>
                                <span class="fw-semibold">
                                    Chat in tempo reale
                                </span>
                                <p class="text-secondary">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                                </p>
                            </li>
                            <li>
                                <span class="fw-semibold">
                                    Lista di contatti personali
                                </span>
                                <p class="text-secondary">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                                </p>
                            </li>
                            <li>
                                <span class="fw-semibold">
                                    Sistema di autenticazione sicuro
                                </span>
                                <p class="text-secondary">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                                </p>
                            </li>
                            <li>
                                <span class="fw-semibold">
                                    Gestione profilo utente
                                </span>
                                <p class="text-secondary">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                                </p>
                            </li>
                            <li>
                                <span class="fw-semibold">
                                    Gestione contatti
                                </span>
                                <p class="text-secondary">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                                </p>
                            </li>
                            <li>
                                <span class="fw-semibold">
                                    Gestione stato dell'applicazione con Pinia🍍
                                </span>
                                <p class="text-secondary">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

ul {
    color: $text-title;
    list-style: "➡️";
    list-style-position: inside;

    li {
        margin-bottom: 15px;
        font-weight: 600;

        span {
            margin-left: 10px;
        }

        p {
            margin-top: 5px;
        }
    }
}
</style>
