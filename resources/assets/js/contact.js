window.MediumEditor = require('medium-editor/dist/js/medium-editor');

var editor = new MediumEditor('#desc');

$('#submit').click(function(){
    $('form').submit();
});