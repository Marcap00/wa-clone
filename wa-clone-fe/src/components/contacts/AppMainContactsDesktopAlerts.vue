<script setup>
</script>

<template>
    <div class="desktop-alerts d-flex align-items-center gap-2 p-2">
        <i class="fas fa-bell-slash fa-sm"></i>
        <div class="text-alerts">
            <p class="text-white">Turn on notifications</p>
            <p class="text-small fw-semibold">Get notified of new messages on your computer.</p>
            <a class="text-small" href="#">
                Turn on desktop notifications
                <i class="fas fa-chevron-right fa-xs align-middle"></i>
            </a>
        </div>
    </div>

</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.desktop-alerts {
    height: 80px;
    // background-color: #8edafc;
    background-color: $bg-dark-desktop-alerts;
}

.desktop-alerts {

    a,
    p,
    i {
        color: $text-secondary;
    }

    a:hover {
        text-decoration: underline;
    }
}

i.fa-bell-slash {
    background-color: $bg-fa-bell-slash;
    color: $bg-dark-desktop-alerts;
    height: 40px;
    width: 40px;
    border-radius: 50%;
    text-align: center;
    line-height: 40px;
}

.fa-chevron-right {
    margin-top: 1.5px;
}
</style>
