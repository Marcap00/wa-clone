<script setup>
import { useMessageInfoStore } from '../../js/stores/messageInfo'
import { computed } from 'vue'

const messageInfoStore = useMessageInfoStore()
const message = messageInfoStore.dataSingleMessage

const capitalizedMessageStatus = computed(() => {
    return message.status.charAt(0).toUpperCase() + message.status.slice(1)
})

function closeMessageInfo() {
    messageInfoStore.showMessageInfo = false
}

function formatDate(date) {
    return new Date(date).toLocaleTimeString('it-IT', { hour: '2-digit', minute: '2-digit' });
}

function formatDateStatus(date) {
    // Devo formattare la data in modo che il risultato sia "Tuesday at 10:30"
    return new Date(date).toLocaleDateString('en-US', { weekday: 'long', hour: '2-digit', minute: '2-digit' });
}
</script>

<template>
    <div class="message-info">
        <header class="d-flex align-items-center gap-3 p-3">
            <i class="fas fa-xmark" @click="closeMessageInfo"></i>
            <h5>Message Info</h5>
        </header>
        <div class="bg-custom mb-3">
            <div class="message-info-content p-3">
                <div class="message-chat">
                    <div :class="message.status" class="message rounded-3 text-md">
                        {{ message.message }}
                        <time>
                            {{ formatDate(message.date) }}
                        </time>
                    </div>
                </div>
            </div>
        </div>
        <div class="message-info-status p-4">
            <div class="d-flex align-items-center gap-2">
                <i class="fas fa-check-double"></i>
                <p>{{ capitalizedMessageStatus }}</p>
            </div>
            <time>{{ formatDateStatus(message.date) }}</time>
        </div>
    </div>
</template>


<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.message-info {
    color: $text-title;
    background-color: $bg-dark-contacts;
    width: 30%;

    header {
        height: 70px;

        h5 {
            font-size: 18px;
            font-weight: 400;
            flex-grow: 1;
        }
    }

    .bg-custom {
        background-image: url('../../assets/img/custom_mine.jpg');
        background-size: contain;
    }

    .message-info-content {
        height: calc(100% - 70px);
    }

    .message-info-status {
        border-bottom: 1px solid $text-label-active;
        border-top: 1px solid $text-label-active;
    }
}
</style>
