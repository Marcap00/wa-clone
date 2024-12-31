<script setup>
</script>

<template>
    <footer class="footer">
        <div class="footer-content d-flex justify-content-between align-items-center gap-3 h-100 p-3">
            <div>
                <div class="d-flex align-items-center gap-3">
                    <img src="/src/assets/img/whatsapp.png" alt="Logo" class="img-fluid">
                    <address>Created by Marco Cappellato</address>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="https://github.com/Marcap00" target="_blank">
                    <i class="fa-brands fa-github fa-2x"></i>
                </a>
                <a href="https://www.linkedin.com/in/marco-cappellato-5b83a4322" target="_blank">
                    <i class="fa-brands fa-linkedin fa-2x"></i>
                </a>
            </div>
        </div>
    </footer>
</template>

<style lang="scss" scoped>
@import '../../scss/_variables.scss';

footer {
    height: 70px;
    background-color: $bg-dark-contacts;
    color: $text-title;

    img {
        width: 30px;
    }

    i:hover {
        color: $text-label-active;
    }
}
</style>
