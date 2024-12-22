import { defineStore } from 'pinia'

export const useActiveIndexStore = defineStore('activeIndex', {
    state: () => ({
        activeIndex: 0
    })
})

export default useActiveIndexStore
