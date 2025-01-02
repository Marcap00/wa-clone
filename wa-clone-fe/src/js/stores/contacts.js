import { defineStore } from 'pinia';
import { useAuthStore } from './auth';
import axios from 'axios';


export const useContactsStore = defineStore('contacts', {
    state: () => ({
        contacts: [],
        unreadContacts: [],
        apiUrlContacts: 'http://localhost:8000/api/contacts',
        textToFind: '',
        totalNumberLastMessageReceived: 0,
        showAlerts: true,
        closeChat: true
    }),
    actions: {
        async getContacts(router = null) {
            try {
                const authStore = useAuthStore();
                const userId = localStorage.getItem('user_id') ? JSON.parse(localStorage.getItem('user_id')) : authStore.userId;

                if (!userId) {
                    console.error('Nessun utente autenticato');
                    if (router) {
                        router.push({ name: 'unauthorized' });
                    }
                    return;
                }

                const response = await axios.get(this.apiUrlContacts, {
                    params: {
                        user_id: localStorage.getItem('user_id') ? JSON.parse(localStorage.getItem('user_id')) : userId
                    }
                });

                if (response.data?.success) {
                    this.contacts = response.data.results;
                    this.updateTotalNumberLastMessageReceived();
                }
            } catch (error) {
                console.error('Errore nel caricamento dei contatti:', error);
            }
        },
        capitalize(text) {
            return text.charAt(0).toUpperCase() + text.substring(1);
        },
        isInclude(text, textToFind) {
            text = text.toLowerCase();
            textToFind = textToFind.toLowerCase();
            return text.includes(textToFind);
        },
        searchContacts() {
            this.contacts.forEach(contact => {
                contact.visible = this.isInclude(contact.name, this.textToFind);
                contact.name = this.capitalize(contact.name);
            });
        },
        updateTotalNumberLastMessageReceived() {
            this.totalNumberLastMessageReceived = this.contacts.reduce((total, contact) => {
                const messages = contact.messages
                if (!messages.length) return total

                const lastSentIndex = messages
                    .map((msg, index) => ({ status: msg.status, index }))
                    .filter(msg => msg.status === 'sent')
                    .sort((a, b) => b.index - a.index)[0]?.index ?? -1

                if (lastSentIndex === -1) {
                    return total + messages.filter(msg => msg.status === 'received').length
                }

                return total + messages
                    .slice(lastSentIndex + 1)
                    .filter(msg => msg.status === 'received')
                    .length
            }, 0)
        }
    }
});

export default useContactsStore;
