import { defineStore } from 'pinia'

export const useMessageInfoStore = defineStore('messageInfo', {
    state: () => ({
        dataSingleMessage: {},
        showMessageInfo: false,
        isShowMessageInfo: false
    })
})

export default useMessageInfoStore
