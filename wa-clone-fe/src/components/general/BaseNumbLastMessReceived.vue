<script setup>
import { useContactsStore } from '../../js/stores/contacts'

const contactsStore = useContactsStore()

const props = defineProps({
    numberLastMessageReceived: {
        type: Number,
        required: true
    }
})

</script>

<template>
    <div class="number-last-message-received">
        {{ props.numberLastMessageReceived }}
    </div>
</template>


<style lang="scss" scoped>
@import '../../scss/_variables.scss';

.number-last-message-received {
    position: absolute;
    font-weight: 600;
    background-color: $text-last-message-received;
    color: $bg-dark-contacts;
    border-radius: 50%;
    width: 16px;
    height: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
}

.number-last-message-received-position {
    bottom: 9px;
    right: 7px;
}

.number-last-message-received-position-2 {
    top: 0px;
    right: 0px;
}
</style>
