<script setup>
import { reactive, onMounted } from 'vue'
import { useLabelsStore } from '../../js/stores/labels'

const labelsStore = useLabelsStore()
const labels = reactive([
    { id: 1, name: 'All', active: true },
    { id: 2, name: 'Unread', active: false },
    // { id: 3, name: 'Favorites', active: false }
])

// Solo un label può essere attivo
const toggleLabel = (label) => {
    labels.forEach(l => l.active = false)
    label.active = !label.active
    labelsStore.labels = labels
    labelsStore.labelActive = labelsStore.labels.find(label => label.active)
    // console.log('labelsStore.labelActive', labelsStore.labelActive)
}

onMounted(() => {
    labelsStore.labels = labels
    labelsStore.labelActive = labelsStore.labels.find(label => label.active)
    // console.log('labelsStore.labelActive', labelsStore.labelActive)
})

</script>

<template>
    <div class="filter-labels px-3">
        <div class="filter-labels-container h-100">
            <div class="filter-labels-item d-flex align-items-center h-100">
                <p v-for="label in labels" :class="{ 'active': label.active }" class="filter-label"
                    @click="toggleLabel(label)">{{ label.name }}</p>
            </div>
        </div>
    </div>
</template>


<style lang="scss">
@use "../../scss/_variables.scss" as *;

.filter-labels {
    background-color: $bg-dark-contacts;
    height: 45px;


    .filter-label {
        color: $text-secondary;
        background-color: $bg-dark-searchbar;
        padding: 5px 10px;
        border-radius: 25px;
        margin-right: 10px;
        cursor: pointer;

        &.active {
            background-color: $text-last-message-received;
            color: #fff
        }
    }

}
</style>
