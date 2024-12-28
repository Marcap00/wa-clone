import { defineStore } from 'pinia';
export const useContactInfoStore = defineStore('contactInfo', {
    state: () => ({
        contactInfo: false,
        contact: {},
    }),
});

export default useContactInfoStore;
