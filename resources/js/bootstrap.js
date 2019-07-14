window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    
    require('bootstrap');
} catch (e) {
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.interceptors.response.use((response) => {
    
    //Store Current User
    if (response.data.hasOwnProperty('currentUser')) {
        vm.setCurrentUser(response.data.currentUser)
    }
    
    //Toast Message
    if (response.data.hasOwnProperty('message')) {
        Toast.create.positive({
            html:    response.data.message,
            icon:    'fa-check-circle',
            timeout: 2500,
        })
    }
    
    return Promise.resolve(response)
}, (error) => {
    
    handleError(error);
    
    return Promise.reject(error)
});

function handleError(error) {   //Quasar Toast Schema
    let message = {
        html:    'Network Error.',
        icon:    'fa-warning',
        timeout: 2500,
    };
    
    //Setup Error Message
    if (typeof error !== 'undefined') {
        if (error.hasOwnProperty('message')) {
            message.html = error.message
        }
    }
    
    if (typeof error.response !== 'undefined') {
        
        //Setup Generic Response Messages
        if (error.response.status === 401) {
            message.html = 'UnAuthorized';
            alert("Oops! You have to login first! You'll be redirected now :)")
            // Simulate an HTTP redirect:
            window.location.replace("/logout");
        } else if (error.response.status === 404) {
            message.html = 'API Route is Missing or Undefined'
        } else if (error.response.status === 405) {
            message.html = 'API Route Method Not Allowed'
        } else if (error.response.status === 422) {
            //Validation Message
        } else if (error.response.status >= 500) {
            message.html = 'Server Error'
        }
        
        //Try to Use the Response Message
        if (error.hasOwnProperty('response') && error.response.hasOwnProperty('data')) {
            if (error.response.data.hasOwnProperty('message') && error.response.data.message.length > 0) {
                message.html = error.response.data.message
            }
        }
    }
    
    //Toast the Message
    if (message.html.length > 0) {
        alert(message.html);
    }
}

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
