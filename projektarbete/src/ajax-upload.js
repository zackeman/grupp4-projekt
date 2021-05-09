$(document).ready(function(){

   $("#but_upload").click(function(){

       var fd = new FormData();
       var files = $('#file')[0].files;
       
       // Check file selected or not
       if(files.length > 0 ){
          fd.append('file',files[0]);

          $.ajax({
             url: '../src/upload.php',
             type: 'post',
             data: fd,
             contentType: false,
             processData: false,
             success: function(response){
                if(response != 0){
                   $("#img").attr("src",response); 
                   $(".preview img").show(); // Display image element
                }else{
                   alert('Var vänlig välj en bild av format jpg/png som ej överstiger 4 Mb');
                }
             },
          });
       }else{
          alert("Var vänlig välj en bild.");
       }
   });
});