/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

window.Vue = require('vue').default;

import axios from 'axios';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('message', require('./components/Message.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
        message:'',
        chat:{
         message:[]
        },
    },
       
    methods:{
        send(){
            if(this.message.length !=0){
            //console.log(this.message);
             this.chat.message.push(this.message);
             axios.post('/send', {
              message: this.message
             })
             .then(function (response){
               console.log(response);
               this.message = '';
                // var textarea = document.getElementById("form1");
                // textarea.value ="";
             })
             .catch(function(error) {
               console.log(error);
             });
            }
        },
    },
    mounted(){
        console.log("tests");

        // Enable pusher logging - don't include this in production
    //     Pusher = window.Pusher;
    //     Pusher.logToConsole = true;

    //     var pusher = new Pusher('5860cc0ba59b0e5a95ee', {
    //     cluster: 'ap3'
    //     });

    //     var channel = pusher.subscribe('my-channel');
    //     channel.bind('my-event', function(data1) {
    //     //alert(JSON.stringify(data));
    //     datas = JSON.stringify(data1);
    //     alert(datas);
    //     jsondata = JSON.parse(datas);
    //     console.log(jsondata.message);
      
    // });
        
    }
    // mounted(){
    //     window.Echo.private('my-channel')
    //     .listen('my-event', (e) => {
    //         console.log(e);
    //         this.chat.message.push(e.message);
    //     });
    // }
    
});
