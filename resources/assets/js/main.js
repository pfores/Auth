var Vue = require('vue');

new Vue({
    el: '#emailFormGroup',
    data: {
        exists:false
    },
    methods: {
        checkEmailsExists: function () {
            alert('Xivato');
            this.exists=true;
        }
    }
});