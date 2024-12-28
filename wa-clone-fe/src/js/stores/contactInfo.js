import { defineStore } from 'pinia';
export const useContactInfoStore = defineStore('contactInfo', {
    state: () => ({
        contactInfo: true,
        contact: {},
    }),
});

export default useContactInfoStore;
