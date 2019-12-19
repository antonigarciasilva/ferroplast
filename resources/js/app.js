require('./bootstrap');

window.Vue = require('vue');

Vue.component('empleados-component', require('./components/EmpleadosComponent.vue').default);
Vue.component('cargos-component', require('./components/CargosComponent.vue').default);
Vue.component('pagos-component', require('./components/PagosComponent.vue').default);

const app = new Vue({
    el: '#app',

});