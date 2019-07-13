<template>
    <div class="inbox_chat">
        <div class="chat_list" v-for="user in users" v-if="user.username!=username">
            <a href="#" @click="startConversation(user.id)">
                <div class="chat_people">
                    <div class="chat_img">
                        <img src="/png/user.png" :alt="user.username">
                    </div>
                    <div class="chat_ib">
                        <h5>{{user.username}} <span class="chat_date"></span></h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        methods: {
            startConversation(user) {
                this.$emit('new-conversation', user)
            }
        },
        props:   {
            users:    Array,
            username: String,
            user_id:  Number
        }
    }
</script>
