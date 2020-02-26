/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import 'vue-search-select/dist/VueSearchSelect.css'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('model-select', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 window.$components = require('vue-search-select/src/lib');

window.app = new Vue({
    el: '#app',
    components: {...$components},
    data: {
        bitem: {
            id: '',
            type: '',
            score: '',
            is_winner: false,
        },
        showBitemModal: false,
    },
    methods: {
        setbitem(bitem) {
            this.bitem = bitem;
            this.showBitemModal = true;
        },
        savebitem() {
            axios.post('/bitem/update', this.bitem)
            .then(res => this.updatebitem())
            .catch(res => this.updatebitem())
        },
        updatebitem() {
            console.log('reloading')
            location.reload();
        },
        resetbitem() {
            this.bitem.score = -1;
            this.bitem.team_id = null;
            this.bitem.type = 'tbd';
        }
    }
});
