<script setup>
import { useContactsStore } from '../../js/stores/contacts';

const contactsStore = useContactsStore();

const closeAlerts = () => {
    contactsStore.showAlerts = false;
}
</script>

<template>
    <div v-if="contactsStore.showAlerts"
        class="desktop-alerts-container d-flex align-items-center justify-content-between">
        <div class="desktop-alerts d-flex align-items-center gap-2 p-3">
            <i class="fas fa-bell-slash fa-sm"></i>
            <div class="text-alerts">
                <p class="text-white mb-1">Turn on notifications</p>
                <p class="text-md">Get notified of new messages on your computer.</p>
                <a class="text-md" href="#">
                    Turn on desktop notifications
                    <i class="fas fa-chevron-right fa-xs align-middle"></i>
                </a>
            </div>
        </div>
        <i @click="closeAlerts()" class="fas fa-xmark p-3 fa-lg color-icon"></i>
    </div>

</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.desktop-alerts {
    height: 90px;
    // background-color: #8edafc;
}

.desktop-alerts-container {
    background-color: $bg-dark-desktop-alerts;
    cursor: pointer;
}

.desktop-alerts {

    a,
    p,
    i {
        color: $text-secondary;
    }

    a:hover {
        text-decoration: underline;
    }
}

i.fa-bell-slash {
    background-color: $bg-fa-bell-slash;
    color: $bg-dark-desktop-alerts;
    height: 40px;
    width: 40px;
    border-radius: 50%;
    text-align: center;
    line-height: 40px;
}

.fa-chevron-right {
    margin-top: 1.5px;
}

i.fa-xmark {
    cursor: pointer;
}

.color-icon {
    color: $text-secondary;
}
</style>
