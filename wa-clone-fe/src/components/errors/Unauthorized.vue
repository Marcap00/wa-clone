<script setup>
</script>

<template>
    <div class="unauthorized">
        <h1>401 - Accesso non autorizzato</h1>
        <p>Non hai i permessi per accedere a questa pagina.</p>
        <router-link to="/">Torna alla Home</router-link>
    </div>
</template>


<style scoped>
.unauthorized {
    text-align: center;
    padding: 20px;
}
</style>
