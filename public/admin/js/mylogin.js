/******************************************
 * My Login
 *
 * Bootstrap 4 Login Page
 *
 * @author          Muhamad Nauval Azhar
 * @uri 			https://nauval.in
 * @copyright       Copyright (c) 2018 Muhamad Nauval Azhar
 * @license         My Login is licensed under the MIT license.
 * @github          https://github.com/nauvalazhar/my-login
 * @version         1.2.0
 *
 * Help me to keep this project alive
 * https://www.buymeacoffee.com/mhdnauvalazhar
 * 
 ******************************************/

 'use strict';

 $(function() {
                   // author badge :)
     var author = '<div style="position: fixed;bottom: 0;right: 20px;background-color: #fff;box-shadow: 0 4px 8px rgba(0,0,0,.05);border-radius: 3px 3px 0 0;font-size: 12px;padding: 5px 10px;">By <a href="https://twitter.com/mhdnauvalazhar">@mhdnauvalazhar</a> &nbsp;&bull;&nbsp; <a href="https://www.buymeacoffee.com/mhdnauvalazhar">Buy me a Coffee</a></div>';
     $("body").append(author);
 
     $("input[type='password'][data-eye]").each(function(i) {
         var $this = $(this),
             id = 'eye-password-' + i,
             el = $('#' + id);
            
         $this.wrap($("<div/>", {
             style: 'position:relative',
             id: id
         }));
 
         $this.css({
             paddingRight: 60
         });
         $this.after($("<div/>", {
             html: 'Show',
             class: 'btn btn-primary btn-sm',
             id: 'passeye-toggle-'+i,
         }).css({
                 position: 'absolute',
                 right: 10,
                 top: ($this.outerHeight() / 2) - 12,
                 padding: '2px 7px',
                 fontSize: 12,
                 cursor: 'pointer',
         }));
 
         $this.after($("<input/>", {
             type: 'hidden',
             id: 'passeye-' + i
         }));
 
         var invalid_feedback = $this.parent().parent().find('.invalid-feedback');
 
         if(invalid_feedback.length) {
             $this.after(invalid_feedback.clone());
         }
 
         $this.on("keyup paste", function() {
             $("#passeye-"+i).val($(this).val());
         });
         $("#passeye-toggle-"+i).on("click", function() {
             if($this.hasClass("show")) {
                 $this.attr('type', 'password');
                 $this.removeClass("show");
                 $(this).removeClass("btn-outline-primary");
             }else{
                 $this.attr('type', 'text');
                 $this.val($("#passeye-"+i).val());				
                 $this.addClass("show");
                 $(this).addClass("btn-outline-primary");
             }
         });
     });
 
     $(".my-login-validation").submit(function() { 
     
         var form = $(this);
         if (form[0].checkValidity() === false) {
           event.preventDefault();
           event.stopPropagation();
         }
         form.addClass('was-validated');
     });


     $("#loginbtn").click(function(e){
        // e.preventDefault();
        var email = $("#adminMail").val();
        var regExp = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var passwords =$("#adminPass").val().length;
        
        // +++++++++ For Email +++++++++++
        if(email == ""){
            $('#adminEmail').text('Please Enter mail');
           return false;
        } else if (!email.match(regExp)){
            $('#adminEmail').text('Invalid Email');
            return false;
        }else{
            $('#adminEmail').text('');                
        }
       // +++++++++ For Password +++++++++++
        if( passwords == "" )
        {
            $('#adminPassword').text('Please Enter password');
            return false;
        }
        else if(passwords < 5)
        {
          $('#adminPassword').text('Please Enter password Min 6 Charactor');
          return false;
        }
        else if(passwords > 13)
        {
          $('#adminPassword').text('Please Enter Max  12 Charactor');
          return false;  
        }
        else{
            return true;
        }

        
     });   





     // Login Page Validation

    //  $('#loginbtn').validate({ 
    //     // rules: {
    //     //   name: {
    //     //     required: true
    //     //   },
    //       email: {
    //         required: true,
    //         email: true
    //       },
    //     //   contact: {
    //     //     required: true,
    //     //     rangelength: [10, 12],
    //     //     number: true
    //     //   },
    //     //   password: {
    //     //     required: true,
    //     //     minlength: 8
    //     //   },
    //     //   confirmPassword: {
    //     //     required: true,
    //     //     equalTo: "#password"
    //     //   }
    //     // },
    //     messages: {
    //     //   name: 'Please enter Name.',
    //       email: {
    //         required: 'Please enter Email Address.',
    //         email: 'Please enter a valid Email Address.',
    //       },
    //     //   contact: {

    //     //     required: 'Please enter Contact.',
    //     //     rangelength: 'Contact should be 10 digit number.'
    //     //   },
    //     //   password: {
    //     //     required: 'Please enter Password.',
    //     //     minlength: 'Password must be at least 8 characters long.',
    //     //   },
    //     //   confirmPassword: {
    //     //     required: 'Please enter Confirm Password.',
    //     //     equalTo: 'Confirm Password do not match with Password.',
    //     //   }
    //     },
    //     submitHandler: function (form) {
    //       form.submit();
    //     }
    //   });





 });
 