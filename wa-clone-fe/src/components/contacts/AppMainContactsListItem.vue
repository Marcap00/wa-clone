<script setup>
import { useContactsStore } from '../../js/stores/contacts'
import { useActiveIndexStore } from '../../js/stores/active_index'
import { useFavoritesStore } from '../../js/stores/favorites'
import { useLabelsStore } from '../../js/stores/labels'
import BaseNumbLastMessReceived from '../general/BaseNumbLastMessReceived.vue'
import { computed, onMounted, onBeforeMount } from 'vue'

const contactsStore = useContactsStore()
const activeIndexStore = useActiveIndexStore()
const favoritesStore = useFavoritesStore()
const labelsStore = useLabelsStore()

const props = defineProps({
    contact: {
        type: Object,
        required: true
    },
    i: {
        type: Number,
        required: true
    }
})

const classNumberLastMessageReceived = computed(() => {
    return 'number-last-message-received-position'
})

/* function getImagePath(imagePath) {
    return new URL(`../../assets/img/${imagePath}`, import.meta.url).href;
} */

function setActiveContact(i) {
    activeIndexStore.activeIndex = i
    contactsStore.closeChat = false
    // console.log(activeIndexStore.activeIndex)
}

function formatDate(date) {
    return new Date(date).toLocaleTimeString('it-IT', { hour: '2-digit', minute: '2-digit' })
}

const lastMessage = computed(() => {
    if (!props.contact.messages.length) return
    return props.contact.messages[props.contact.messages.length - 1]
})

const numberLastMessageReceived = computed(() => {
    const messages = props.contact.messages;

    // Se non ci sono messaggi, ritorna 0
    if (!messages.length) return 0;

    // Trova l'indice dell'ultimo messaggio inviato
    const lastSentIndex = messages
        .map((msg, index) => ({ status: msg.status, index }))
        .filter(msg => msg.status === 'sent')
        .sort((a, b) => b.index - a.index)[0]?.index ?? -1;

    // Se non ci sono messaggi inviati, conta tutti i ricevuti
    if (lastSentIndex === -1) {
        return messages.filter(msg => msg.status === 'received').length;
    }


    // Conta solo i messaggi ricevuti che vengono dopo l'ultimo inviato
    return messages
        .slice(lastSentIndex + 1)
        .filter(msg => msg.status === 'received')
        .length;
})

const isFavorite = computed(() => {
    return favoritesStore.favorites.some(favorite => favorite.id === props.contact.id)
})

onBeforeMount(() => {
    contactsStore.totalNumberLastMessageReceived = 0
})

onMounted(() => {
    contactsStore.totalNumberLastMessageReceived += parseInt(numberLastMessageReceived.value)
})

const labelActive = computed(() => {
    /* console.log('labelsStore.labelActive', labelsStore.labelActive)
    console.log('labelsStore.labelActive === Unread', labelsStore.labelActive.name === 'Unread')
    console.log('lastMessage.status === received', lastMessage.status === 'received') */
    if (labelsStore.labelActive.name === 'Unread') {
        return lastMessage.value && lastMessage.value.status === 'received'
    }
    return true
})


</script>

<template>
    <li v-if="labelActive" @click="setActiveContact(props.i)"
        :class="props.i === activeIndexStore.activeIndex ? 'active' : '', !props.contact.visible ? 'd-none' : ''"
        class="d-flex align-items-center p-3">
        <img class="img-avatar me-2" :src="props.contact.avatar" alt="#">
        <ul class="flex-grow-1">
            <li>
                <h3 :class="{ 'fw-semibold': lastMessage?.status === 'received' }" class="mb-1">
                    {{ props.contact.name }}
                    <i v-if="isFavorite" class="far fa-star highlighted-text"></i>
                </h3>
            </li>
            <li v-if="props.contact.messages.length" class="text-small last-message"
                :class="{ 'highlighted-text': lastMessage.status === 'received' }">
                {{ lastMessage.message }}
            </li>
        </ul>
        <time v-if="props.contact.messages.length" :class="{ 'highlighted-text': lastMessage.status === 'received' }">
            {{ formatDate(lastMessage.date) }}
        </time>
        <!-- <div v-if="props.contact.messages.length && lastMessage.status === 'received'"
            class="number-last-message-received">
            {{ numberLastMessageReceived(props.i) }}
        </div> -->
        <BaseNumbLastMessReceived v-if="props.contact.messages.length && lastMessage.status === 'received'"
            :class="classNumberLastMessageReceived" :numberLastMessageReceived="numberLastMessageReceived" />
    </li>

</template>
