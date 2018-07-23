import Vue from 'vue'

import App from './App.vue'

new Vue({
    el: '#vueApp',
    render(createElement){
        return createElement(App)
    }
});