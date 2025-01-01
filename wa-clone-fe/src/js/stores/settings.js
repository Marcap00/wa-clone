import { defineStore } from 'pinia'

export const useSettingsStore = defineStore('settings', {
    state: () => ({
        showSettings: false
    })
})

export default useSettingsStore
