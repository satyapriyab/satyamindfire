$(function() {
    $("form[name='user_registration']").validate({
        rules: {
            Username: "required",
            email: {
                required: true,
                email: true
            },
            n_pass: {
                required: true,
                minlength: 5
            }
     //       r_pass:{
    //            required: true,
    //            minlength: 5
     //       }
        },
        messages: {
            Username: "Please enter your Username",
        n_pass: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
  ///     r_pass:{
   //         required:"Please provide a password",
   //         minlength:"Your password must be at least 5 characters long"
        }
        email: "Please enter a valid email address"
        },
        submitHandler: function(form) {
      form.submit();
    }
  });
});