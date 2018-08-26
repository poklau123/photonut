
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

(function(){
    //发送验证码
    $('#btn_code').click(function(){
        var phone = $('input[name=phone]').val();
        var verify_form = $('#verify-form');
        verify_form.find('input[name=phone]').val(phone);
        verify_form.submit();
    });
    //发送时间间隔
    var btn_code_redo = $('#btn_code.redo');
    if(btn_code_redo.length > 0){
        var time = $('#btn_code.redo').data('time');
        var phone_input = $('input[name=phone]');
        var handler = setInterval(function(){
            time--;
            if(time == 0){
                btn_code_redo.text('发送验证码');
                btn_code_redo.prop('disabled', false);
                clearInterval(handler);
            }else{
                btn_code_redo.text('重新发送('+time+')');
            }
        }, 1000);
    }
})();
