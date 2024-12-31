<script setup>
</script>

<template>
    <footer class="footer">
        <div class="footer-content d-flex justify-content-between align-items-center gap-3 h-100 p-3">
            <div class="d-flex align-items-center gap-3">
                <img src="/src/assets/img/whatsapp.png" alt="Logo" class="img-fluid">
                <p>WA Clone</p>
            </div>
            <div>
                <p>Created by Marco Cappellato</p>
            </div>
            <address>
                <i class="fa-brands fa-github"></i>
                <i class="fa-brands fa-linkedin"></i>
            </address>
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
}
</style>
