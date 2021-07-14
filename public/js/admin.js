

var base = location.protocol+'//'+location.host;
$(document).ready(function(){
    editor_init('descripcion');
})

function editor_init(field){
   editor =  CKEDITOR.replace(field);
   CKFinder.setupCKEditor(editor,'http://127.0.0.1/public/js/ckfinder');
}