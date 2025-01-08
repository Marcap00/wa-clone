<script setup>
</script>

<template>
    <!-- <div class="loader-container"> -->
    <div class="loader"></div>
    <!-- </div> -->
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.loader-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

/* Credits: https://css-loaders.com/spinner/ */
/* HTML: <div class="loader"></div> */
.loader {
    width: 21px;
    aspect-ratio: 1;
    display: grid;
    -webkit-mask: conic-gradient(from 15deg, #0000, #000);
    animation: l26 1s infinite steps(12);
}

.loader,
.loader:before,
.loader:after {
    background:
        radial-gradient(closest-side at 50% 12.5%,
            $text-label-active 96%, #0000) 50% 0/20% 80% repeat-y,
        radial-gradient(closest-side at 12.5% 50%,
            $text-label-active 96%, #0000) 0 50%/80% 20% repeat-x;
}

.loader:before,
.loader:after {
    content: "";
    grid-area: 1/1;
    transform: rotate(30deg);
}

.loader:after {
    transform: rotate(60deg);
}

@keyframes l26 {
    100% {
        transform: rotate(1turn)
    }
}
</style>
