<script setup>
</script>

<template>
    <div class="desktop-alerts d-flex align-items-center gap-2 p-2">
        <i class="fas fa-bell-slash fa-sm"></i>
        <div class="text-alerts">
            <p class="text-small fw-semibold">Ricevi notifiche di nuovi messaggi</p>
            <a class="text-small" href="#">Attiva notifiche desktop</a>
        </div>
    </div>

</template>

<style lang="scss" scoped>
.desktop-alerts {
    height: 60px;
    background-color: #8edafc;
}

.desktop-alerts a {
    color: grey;
}

i.fa-bell-slash {
    background-color: white;
    color: #8edafc;
    height: 40px;
    width: 40px;
    border-radius: 50%;
    text-align: center;
    line-height: 40px;
}
</style>
