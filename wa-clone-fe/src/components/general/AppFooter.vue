<script setup>
import BaseLogo from './BaseLogo.vue'
</script>

<template>
    <footer class="footer">
        <div class="footer-content d-flex justify-content-between align-items-center h-100 p-3">
            <div>
                <div class="d-flex align-items-center">
                    <BaseLogo />
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
    height: 60px;
    background-color: $bg-dark-contacts;
    color: $text-title;

    i:hover {
        color: $text-label-active;
    }
}
</style>
