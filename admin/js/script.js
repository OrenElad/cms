tinymce.init({
  selector: 'textarea',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });

$(document).ready(function(){
      $('#selectAllBoxes').click(function(event){
              $('.checkBoxes').each(function(){
                  this.checked = !this.checked;
              })
      })
});

$("body").prepend("<div id='load-screen'><div id='loading'></div></div>");

$('#load-screen').delay(700).fadeOut(600, function(){
  $(this).remove();
});

function loadUsersOnline(){
  $.get("functions.php?onlineusers=result", function(data){
    $("#usersonline").text(data);
  });
};


setInterval(function(){
  loadUsersOnline();
},2000);