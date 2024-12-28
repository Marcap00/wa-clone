<script setup>
import { useContactsStore } from '../../js/stores/contacts'
import { useActiveIndexStore } from '../../js/stores/active_index'
import { useLabelsStore } from '../../js/stores/labels'
import BaseNumbLastMessReceived from '../general/BaseNumbLastMessReceived.vue'
import { computed, onMounted, ref, onUpdated } from 'vue'
import { useRouter } from 'vue-router'

const contactsStore = useContactsStore()
const activeIndexStore = useActiveIndexStore()
const labelsStore = useLabelsStore()
const router = useRouter()
const displayedOnlyUnread = ref(false)

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

function getImagePath(imagePath) {
    return new URL(`../../assets/img/${imagePath}`, import.meta.url).href;
}

function setActiveContact(i) {
    activeIndexStore.activeIndex = i
    // console.log(activeIndexStore.activeIndex)
}

function formatDate(date) {
    return new Date(date).toLocaleTimeString('it-IT', { hour: '2-digit', minute: '2-digit' })
}

const lastMessage = computed(() => {
    if (!props.contact.messages.length) return
    return props.contact.messages[props.contact.messages.length - 1]
})

function numberLastMessageReceived(i) {
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
}

const label = computed(() => {
    return labelsStore.labels.find(label => label.active)
})


onMounted(() => {
    contactsStore.totalNumberLastMessageReceived += parseInt(numberLastMessageReceived(props.i))
    if (label.value.name === 'Unread') {
        displayedOnlyUnread.value = true
        console.log('displayedOnlyUnread', displayedOnlyUnread.value)
    }
})

onUpdated(() => {
    if (label.value.name === 'Unread') {
        displayedOnlyUnread.value = true
        console.log('displayedOnlyUnread', displayedOnlyUnread.value)
        contactsStore.getContacts(router)
    }
})

</script>

<template>
    <li v-if="!displayedOnlyUnread" @click="setActiveContact(props.i)"
        :class="props.i === activeIndexStore.activeIndex ? 'active' : '', !props.contact.visible ? 'd-none' : ''"
        class="d-flex align-items-center p-3">
        <img class="img-avatar me-2" :src="props.contact.avatar" alt="#">
        <ul class="flex-grow-1">
            <li>
                <h3 :class="{ 'fw-semibold': lastMessage?.status === 'received' }" class="mb-1">
                    {{ props.contact.name }}
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
            :class="classNumberLastMessageReceived" :numberLastMessageReceived="numberLastMessageReceived(props.i)" />
    </li>

</template>
