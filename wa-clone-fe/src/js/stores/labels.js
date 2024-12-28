import { defineStore } from 'pinia'

export const useLabelsStore = defineStore('labels', {
    state: () => ({
        labels: [],
        labelActive: null
    })
})
