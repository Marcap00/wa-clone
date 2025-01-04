<script setup>
import BaseLogoXL from '../general/BaseLogoXL.vue'
import { ref, reactive } from 'vue'

const description = ref('Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.')

const services = reactive([
    {
        id: 1,
        title: 'Chat in tempo reale',
        description,
    },
    {
        id: 2,
        title: 'Lista di contatti personali',
        description,
    },
    {
        id: 3,
        title: 'Sistema di autenticazione sicuro',
        description,
    },
    {
        id: 4,
        title: 'Gestione profilo utente',
        description,
    },
    {
        id: 5,
        title: 'Gestione contatti',
        description,
    },
    {
        id: 6,
        title: "Gestione stato dell'applicazione con Pinia🍍",
        description,
    },
])
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
                            <li v-for="service in services" :key="service.id">
                                <span class="fw-semibold">
                                    {{ service.title }}
                                </span>
                                <p class="text-secondary">
                                    {{ service.description }}
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
