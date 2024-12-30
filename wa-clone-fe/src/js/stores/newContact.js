import { defineStore } from 'pinia';

export const useNewContactStore = defineStore('newContact', {
    state: () => ({
        newContactDisplayed: false,
        newContact: {
            name: '',
            phone_number: '',
            user_id: ''
        }
    })
});

export default useNewContactStore;
