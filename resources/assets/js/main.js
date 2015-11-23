var Vue = require('vue');

var $ = require('jquery');

var vm = new Vue({
    el: '#email',
    data: {
        exists:false,
        placeholder: "youremail@gmail.com",
        url: "http://auth.app/checkEmailExists"
    },
    methods: {
        checkEmailExists: function () {
            var email = $('#email').value();
            console.debug("checkEmailExists EXECUTED!");
            console.debug("A punt de cridar");
            console.debug(this.url);
            console.debug(email);
            var url = this.url + '?email=' + email;
            console.debug(url);

            $.ajax(url).done(function(data){
                //Ok
                console.debug(data);
            }).fail(function(data) {
                //error
            }).always(function(data) {
                //always
                console.debug('Xivato!');
            });

        }
    }
});