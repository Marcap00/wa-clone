<script setup>
import { useActiveIndexStore } from '../../js/stores/active_index'
import { useContactsStore } from '../../js/stores/contacts'
import { computed } from 'vue'

const contactsStore = useContactsStore()
const activeIndexStore = useActiveIndexStore()

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
    return contactsStore.contacts[i].messages.filter(message => message.status === 'received').length
}


</script>

<template>
    <li @click="setActiveContact(props.i)"
        :class="props.i === activeIndexStore.activeIndex ? 'active' : '', !props.contact.visible ? 'd-none' : ''"
        class="d-flex align-items-center p-2">
        <img class="img-avatar me-2" :src="props.contact.avatar" alt="#">
        <ul class="flex-grow-1">
            <li>
                <h3>
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
        <div v-if="props.contact.messages.length && lastMessage.status === 'received'"
            class="number-last-message-received">
            {{ numberLastMessageReceived(props.i) }}
        </div>
    </li>

</template>
