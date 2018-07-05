$("#contactForm").validator().on("submit", function (event) {
         if (event.isDefaultPrevented()) {
             // handle the invalid form...
             submitMSG(false);
         } else {
             // everything looks good!
             event.preventDefault();
             submitForm();
         }
     });


     function submitForm(){
         // Initiate Variables With Form Content
         var name = $("#name").val();
         var email = $("#email").val();
         var message = $("#message").val();

         $.ajax({
             type: "POST",
             url: "/kontakty/handler.php",
             data: "name=" + name + "&email=" + email + "&message=" + message,
             success : function(text){
                 if (text == "success"){
                     formSuccess();
                 } else {
                     submitMSG(false,text);
                 }
             }
         });
     }

     function formSuccess(){
         $("#contactForm .form-body").remove();
         submitMSG(true)

     }


     function submitMSG(valid, msg){
         if(valid){
             var msgClasses = "text-success";
         } else {
             var msgClasses = "text-danger hidden";
         }
         $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
     }
