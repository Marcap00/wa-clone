import { defineStore } from 'pinia'

export const useFavoritesStore = defineStore('favorites', {
    state: () => ({
        favorites: localStorage.getItem('favorites') ? JSON.parse(localStorage.getItem('favorites')) : []
    })
})

export default useFavoritesStore
