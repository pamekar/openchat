<template>
    <div class="container-fluid">
        <h3 class=" text-center">Messaging - <span>{{chattingWith}} | <a href="/logout" class="btn btn-primary btn-sm"><i class="fa fa-sign-out mr-1"></i> Logout</a></span></h3>
        <div class="messaging">
            <div class="inbox_msg row">
                <div class="inbox_people col-md-3">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Recent</h4>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">
                                <input type="text" class="search-bar" placeholder="Search">
                                <span class="input-group-addon"><button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button></span>
                            </div>
                        </div>
                    </div>
                    <chat-conversations-component @change-conversation="getConversation" :conversations="conversations" :activeConversation="activeConversation" :username="username" :user_id="user_id"></chat-conversations-component>

                </div>
                <div class="mesgs col-md-6">
                    <chat-messages-component :messages="messages" :username="username" :user_id="user_id"></chat-messages-component>

                    <div class="type_msg">
                        <div class="input_msg_write">
                            <form @submit.prevent="sendMessage" id="write_message">
                                <input type="text" class="write_msg" placeholder="Type a message" v-model="message"/>
                                <button type="button" title="Reload" class="msg_refresh_btn" @click="getConversation(activeConversation)"><i aria-hidden="true" class="fa fa-refresh"></i></button>
                                <button class="msg_send_btn" type="submit" title="send"><i class="fa fa-paper-plane-o"
                                                                                           aria-hidden="true"></i></button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Users</h4>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">
                                <input type="text" class="search-bar" placeholder="Search">
                                <span class="input-group-addon"><button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button></span>
                            </div>
                        </div>
                    </div>

                    <users-component :users="users" @new-conversation="startConversation" :username="username" :user_id="user_id"></users-component>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import ChatConversations from './components/ChatConversationsComponent.vue'
    import ChatMessages from './components/ChatMessagesComponent.vue'
    import Users from './components/UsersComponent.vue'

    export default {
        data() {
            return {
                activeConversation: 0,
                chattingWith:       "",
                conversations:      [],
                message:            "",
                messages:           [],
                users:              [],
                user_id:            0,
                username:           ""
            }
        },
        mounted() {
            this.setUp();
            this.user_id = parseInt(document.getElementById('user_id').content);
            this.username = document.getElementById('username').content;
        },
        methods:    {
            getConversation(id) {
                axios.get(`/api/conversations/${id}`)
                    .then(({data}) => {
                        this.messages = data.messages;
                        this.activeConversation = parseInt(data.id);
                        this.chattingWith = data.username_1 === this.username ? data.username_2 : data.username_1;
                        this.getConversations();
                    });
            },
            getConversations() {
                axios.get("/api/conversations")
                    .then(({data}) => {
                        this.conversations = data.conversations;
                    });
            },
            getUsers() {
                axios.get(`/api/users`)
                    .then(({data}) => {
                        this.users = data;
                    });
            },
            sendMessage() {
                axios.post(`/api/messages`, {conversation_id: this.activeConversation, content: this.message})
                    .then(({data}) => {
                        this.messages.push(data);
                        this.message = "";
                        this.getConversation(this.activeConversation);
                    });
            },
            setUp() {
                this.getConversations();
                this.getUsers();
            },
            startConversation(user) {
                axios.post(`/api/conversations`, {'user': user})
                    .then(({data}) => {
                        this.messages = data.conversation.messages;
                        this.activeConversation = parseInt(data.conversation.id);
                        this.getConversations();
                    });
            }
        },
        components: {
            'chat-conversations-component': ChatConversations,
            'chat-messages-component':      ChatMessages,
            'users-component':              Users,
        },
        watch:      {
            // whenever question changes, this function will run
            messages: function (newMessages, oldMessages) {
                window.setTimeout(function () {
                    let objDiv = document.getElementById("message_history");
                    objDiv.scrollTop = objDiv.scrollHeight;
                }, 300);
            }
        },
    }
</script>
