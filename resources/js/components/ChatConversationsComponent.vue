<template>
    <div class="inbox_chat">
        <div class="chat_list" :id="'conversation'+conversation.id" :class="{active_chat:conversation.id==activeConversation}" v-for="conversation in conversations">
            <a href="#" @click="changeConversation(conversation.id)">
                <div class="chat_people">
                    <div class="chat_img"><img src="/png/user.png"
                                               alt="sunil"></div>
                    <div class="chat_ib">
                        <h5 v-if="conversation.username_1===username">{{conversation.username_2}} <span class="chat_date">{{conversation.sent_at}}</span></h5>
                        <h5 v-else>{{conversation.username_1}} <span class="chat_date">{{conversation.sent_at}}</span></h5>
                        <p v-if="conversation.messages.length > 0">{{preview(conversation)}}</p>
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
        methods:  {
            changeConversation(id) {
                this.$emit('change-conversation', id);
            },
            preview(conversation) {
                let message = conversation.messages;
                let content = message[message.length - 1].content;
                let strlen = content.length;
                return strlen > 20 ? content.slice(0, 20) + "..." : content.slice(0, strlen) + "...";
            }
        },
        computed: {},
        props:    {
            activeConversation: Number,
            conversations:      Array,
            user_id:            Number,
            username:           String
        }
    }
</script>