<script setup>

function reload() {
    location.reload();
}
</script>

<template>
    <header class="d-flex justify-content-between align-items-center p-2">
        <!-- Avatar -->
        <div class="avatar d-flex align-items-center">
            <!-- Avatar Image -->
            <img class="img-avatar" src="../assets/img/avatar_io.png" alt="Avatar">
            <!-- Name Avatar -->
            <h3>Sofia</h3>
        </div>
        <!-- Icons Column Left -->
        <div class="icons">
            <i @click="reload()" class="fas fa-circle-notch mx-2"></i>
            <i class="fas fa-message mx-2"></i>
            <i class="fas fa-ellipsis-v mx-2"></i>
        </div>
    </header>

</template>

<style lang="scss" scoped></style>
