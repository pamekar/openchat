<template>
    <div class="msg_history" id="message_history">
        <div v-if="messages.length>0">
            <div v-for="message in messages">
                <div class="outgoing_msg" v-if="message.user_id==user_id">
                    <div class="sent_msg">
                        <p>{{message.content}}</p>
                        <span class="time_date">{{message.sent_at}}</span>
                    </div>
                </div>
                <div class="incoming_msg" v-else>
                    <div class="incoming_msg_img">
                        <img src="/png/user.png" :alt="message.user_id"></div>
                    <div class="received_msg">
                        <div class="received_withd_msg">
                            <p>{{message.content}}</p>
                            <span class="time_date">{{message.sent_at}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-info alert-dismissible" v-else>
            <h3 class="alert-heading">Oops! You have no active chat.</h3>
            <ul>
                <li>Please select a conversation from the left sidebar, or start a new chart with one of the users on the right sidebar.</li>
                <li>If there are no users, just invite a friend. If you have no friend, just wait a bit for someone to join :)</li>
                <li>When you've found a user, please start a conversation.</li>
                <li>Try one of the above to make this alert go away ;)</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        methods: {},
        props:   {
            messages: Array,
            user_id:  Number,
            username: String
        }
    }
</script>
