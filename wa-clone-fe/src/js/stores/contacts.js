import { defineStore } from 'pinia';
import axios from 'axios';
export const useContactsStore = defineStore('contacts', {
    state: () => ({
        contacts: [],
        apiUrlContacts: 'http://localhost:8000/api/contacts'
    }),
    actions: {
        async getContacts() {
            try {
                const response = await axios.get(this.apiUrlContacts);
                this.contacts = response.data.results;
                console.log(this.contacts);
            } catch (error) {
                console.error('Errore nel caricamento dei contatti:', error);
            }
        }
    }
});

export default useContactsStore;
