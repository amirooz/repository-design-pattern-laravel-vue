/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import moment from 'moment';
import VueRouter from 'vue-router';
import { Form, HasError, AlertError } from 'vform';
import VueProgressBar from 'vue-progressbar';
import Swal from 'sweetalert2';
import autofocus from 'vue-autofocus-directive';


window.Form = Form;
window.Swal = Swal;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.use(VueRouter);

Vue.directive('autofocus', autofocus);

let routes = [
  { path: '/home', component: require('./components/Dashboard.vue').default },
  { path: '/dashboard', component: require('./components/Dashboard.vue').default },
  { path: '/division', component: require('./components/Division.vue').default },
  { path: '/mahanagar', component: require('./components/Mahanagar.vue').default },
  { path: '/district', component: require('./components/District.vue').default },
  { path: '/thana', component: require('./components/Thana.vue').default },
  { path: '/upazilla', component: require('./components/Upazilla.vue').default },
  { path: '/pourashava', component: require('./components/Pourashava.vue').default },
  { path: '/union', component: require('./components/Union.vue').default },
  { path: '/member', component: require('./components/Member.vue').default },
  { path: '/permission', component: require('./components/Permission.vue').default },
  { path: '/roles', component: require('./components/Roles.vue').default },
  // { path: '/user', component: require('./components/Users.vue').default },
  { path: '/developer', component: require('./components/Developer.vue').default },
  { path: '*', component: require('./components/NotFound.vue').default }
];

const router = new VueRouter({
  mode: 'history',
  routes
});

Vue.filter('capitalize', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1);
});

Vue.filter('myDate', function(created){
    return moment(created).format("MMM D, YYYY");
});

Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '3px'
});

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

window.Toast = Toast;

window.Fire = new Vue();
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

Vue.component('passport-clients', require('./components/passport/Clients.vue').default);

Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue').default);

Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue').default);

Vue.component('access-denied', require('./components/AccessDenied.vue').default);

Vue.component('pagination', require('laravel-vue-pagination'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    data: {
        search: ''
    },
    methods: {
        searching: _.debounce(() => {
            Fire.$emit('searching');
        }, 1500)
    }
});
