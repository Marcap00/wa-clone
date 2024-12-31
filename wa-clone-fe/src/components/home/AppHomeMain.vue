<script setup>
</script>

<template>
    <main class="h-main overflow-y-scroll">
        <section id="hero" class="hero py-5">
            <div class="container h-100">
                <div class="hero-content h-100 d-flex flex-column justify-content-center align-items-center">
                    <h1 class="mb-3">
                        Welcome to WhatsApp Clone
                    </h1>
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
        <section id="services" class="services py-5">
            <div class="container">
                <h2 class="text-center mb-5">
                    Services🧾
                </h2>
                <div class="row">
                    <div class="col-5 d-flex justify-content-center align-items-center py-4">
                        <img src="/src/assets/img/whatsapp.png" alt="" class="img-fluid mb-5">
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
        <section id="contacts" class="contacts py-5">
            <div class="container">
                <h2 class="text-center mb-5">
                    Contacts👥
                </h2>
                <div class="row">
                    <div class="col-6">
                        <div class="d-flex justify-content-center align-items-center p-3">
                            <img src="https://avatars.githubusercontent.com/u/173565393?v=4" alt=""
                                class="img-fluid mb-3 me-3 rounded-circle">
                            <div>
                                <a href="https://github.com/Marcap00">
                                    <i class="fa-brands fa-github fa-3x mx-3"></i>
                                </a>
                                <a href="www.linkedin.com/in/marco-cappellato-5b83a4322">
                                    <i class="fa-brands fa-linkedin fa-3x mx-3"></i>
                                </a>
                                <h2 class="fw-semibold">
                                    Marco Cappellato
                                </h2>
                                <h4 class="text-white mb-2">
                                    Junior Web Developer
                                </h4>
                                <p class="text-white mb-2">
                                    cappellatomarco00@gmail.com
                                </p>
                                <p class="text-white">
                                    Tech Stack:
                                    <span class="fw-semibold">
                                        HTML, CSS, Bootstrap, JavaScript, Vue.js, Pinia, PHP, MySQL, Laravel
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

main {
    background-color: $bg-dark-searchbar;
}


h2 {
    color: $text-title;
    font-size: 2.5rem;
}

.hero {
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0.721) 100%, transparent), url('../../assets/img/hero.jpg');
    background-size: cover;
    background-position: center;
    color: $text-title;
    height: 500px;

    p {
        width: 50%;
    }

}

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

img {
    width: 250px;

    &.img-fluid {
        max-width: 100%;
        height: auto;
    }
}

.contacts {
    i:hover {
        color: #FF7300;
    }
}
</style>
