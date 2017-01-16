/*
* File    : form_jquery.js
* Purpose : Contains all functions for User Registration Form Validation, table creation and update
* Created : 11-jan-2017
* Author  : Satyapriya Baral
*/

$(function() {
    $("#nameErrorMessage").hide();
    $("#passwordErrorMessage").hide();
    $("#retypePasswordErrorMessage").hide();
    $("#emailErrorMessage").hide();
    $("#mobileNumberErrorMessage").hide();
    $("#addressErrorMessage").hide();
    $("#pinodeErrorMessage").hide();
    $("#genderErrorMessage").hide(); 
    $("#birthdayErrorMessage").hide();
    $("#duplicateUsernameErrorMessage").hide();
    $("#duplicateEmailErrorMessage").hide();
    
    var errorName = false;
    var errorNewPassword = false;
    var errorRetypePassword = false;
    var errorEmail = false;
    var errorMobileNumber = false;
    var errorAddress = false;
    var errorPincode = false;
    var errorGender = false;
    var errorBirthday = false;
    var errorDuplicateUsername = false;
    var errorDuplicateEmail = false;
    
    $("#formName").focusout(function(){
        checkName();
        checkDuplicateUsername();
    });
    
    $("#formNewPassword").focusout(function(){
        checkPassword();
    });
    
    $("#formRetypePassword").focusout(function(){
        checkRetypePassword();
    });
    
    $("#formBirthday").focusout(function(){
        checkBirthday();
    });
    
    $("#formGender").focusout(function(){
        checkGender();
    });
    
    $("#formEmail").focusout(function(){
        checkEmail();
        checkDuplicateUsername();
    });

    $("#formMobileNumber").focusout(function(){
        checkMobileNumber();
    });
    
    $("#formAddress").focusout(function(){
        checkAddress();
    });
    
    $("#formPincode").focusout(function(){
        checkPincode();
    });
    
    /*
    * Function for Username Validation.
    * Takes id of name as input.
    */
    function checkName(){
        var nameLength = $("#formName").val().length;
        if(nameLength < 5 || nameLength > 30)
        {
            $("#nameErrorMessage").html("should be between 5-30 charecters");
            $("#nameErrorMessage").show();
            errorName = true;
        }
        else
        {
            $("#nameErrorMessage").hide();
        }
    }
    
    /*
    * Function for Password Validation.
    * Take id of password field as input.
    */
    function checkPassword(){
        var newPassword = $("#formNewPassword").val();
        var retypePassword = $("#formRetypePassword").val();
        if(( newPassword != retypePassword ) || ( newPassword.length < 5 || retypePassword.length < 5 ))
        {
            $("#retypePasswordErrorMessage").html("Password Error (should match and minimum of 5 charecters)");
            $("#passwordErrorMessage").html("Password Error (should match and minimum of 5 charecters)");
            $("#retypePasswordErrorMessage").show();
            $("#passwordErrorMessage").show();
            errorRetypePassword = true;
            errorNewPassword = true;
        }
        else
        {
            $("#retypePasswordErrorMessage").hide();
            $("#passwordErrorMessage").hide();
        }
    }
    
    /*
    * Function for Password Validation.
    * Takes id of Retype Password field as input.
    */
    function checkRetypePassword(){
        var   newPassword = $("#formNewPassword").val();
        var   retypePassword = $("#formRetypePassword").val();
        if(( newPassword != retypePassword ) || ( newPassword.length < 5 || retypePassword.length < 5 ))
        {
            $("#retypePasswordErrorMessage").html("Password Error (should match and minimum of 5 charecters)");
            $("#passwordErrorMessage").html("Password Error (should match and minimum of 5 charecters)");
            $("#retypePasswordErrorMessage").show();
            $("#passwordErrorMessage").show();
            errorRetypePassword = true;
            errorNewPassword = true;
        }
        else
        {
            $("#retypePasswordErrorMessage").hide();
            $("#passwordErrorMessage").hide();
        }
    }
    
    /*
    * Function for Email Validation.
    * Takes id of Email field as input.
    */
    function checkEmail(){
        var email = $("#formEmail").val();
        var at_pos = email.indexOf("@");
        var dot_pos = email.lastIndexOf(".");
        if ( at_pos < 1 || dot_pos < at_pos+2 || dot_pos+2 >= email.length ) {
            $("#emailErrorMessage").html("Incorrect Mail");
            $("#emailErrorMessage").show();
            errorEmail = true;
        }
        else
        {
            $("#emailErrorMessage").hide();
        }
    }
    
    /*
    * Function for Gender Validation.
    * Takes id of gender as input.
    */
    function checkGender()
    {
        var flag = 0;
        if($('#formGenderMale').is(':checked') || $('#formGenderFemale').is(':checked') || $('#formGenderOther').is(':checked'))
        {
            flag = 1;
        }
        if( flag != 1 )
        {
            $("#genderErrorMessage").html("Enter Gender");
            $("#genderErrorMessage").show();
            errorGender = true;
        }
        else
        {
            $("#genderErrorMessage").hide();
        }
	}
    
    /*
    * Function for Birthday Validation.
    * Takes id of birthday field as input.
    */
    function checkBirthday(){
        var birthdayLength = $("#formBirthday").val().length;
        if(birthdayLength < 1)
        {
            $("#birthdayErrorMessage").html("Enter Birthday");
            $("#birthdayErrorMessage").show();
            errorBirthday = true;
        }
        else
        {
            $("#birthdayErrorMessage").hide();
        }
    }
    
    /*
    * Function for Mobile Number Validation.
    * Takes id of Mobile Number field as input.
    */
    function checkMobileNumber(){
        var mobileNumberLength = $("#formMobileNumber").val().length;
        if(mobileNumberLength < 10 || mobileNumberLength > 10)
        {
            $("#mobileNumberErrorMessage").html("should be 10 digits");
            $("#mobileNumberErrorMessage").show();
            errorMobileNumber = true;
        }
        else
        {
            $("#mobileNumberErrorMessage").hide();
        }
    }
    
    /*
    * Function for Address Validation.
    * Takes id of address field as input.
    */
    function checkAddress(){
        var addressLength = $("#formAddress").val().length; 
        if(addressLength < 1)
        {
            $("#addressErrorMessage").html("Enter Address");
            $("#addressErrorMessage").show();
            errorAddress = true;
        }
        else
        {
            $("#addressErrorMessage").hide();
        }
    }
    
    /*
    * Function for Pincode Validation.
    * Takes id of pincode field as input.
    */
    function checkPincode(){
        var pincodeLength = $("#formPincode").val().length;
        if(pincodeLength < 5)
        {
            $("#pincodeErrorMessage").html("should be atleast 5 digits");
            $("#pincodeErrorMessage").show();
            errorPincode = true;
        }
        else
        {
            $("#pincodeErrorMessage").hide();
        }
    }
    
    /*
    * Submit Button Function.
    * Submits the form and deletes the row in the table that will be updated.
    */
    $("#userRegistrationForm").on('submit' , function(e){
        e.preventDefault();
        
        errorName = false;
        errorNewPassword = false;
        errorRetypePassword = false;
        errorEmail = false;
        errorMobileNumber = false;
        errorAddress = false;
        errorPincode = false;
        errorGender = false;
        errorBirthday = false;
        errorDuplicateUsername = false;
        errorDuplicateEmail = false;
        
        checkName();
        checkPassword(); 
        checkRetypePassword();
        checkEmail();
        checkMobileNumber();
        checkAddress();
        checkPincode();
        checkGender();
        checkBirthday();
        checkDuplicateUsername();
        checkDuplicateEmail();
        
        if(errorName === false && errorNewPassword === false && errorRetypePassword === false
           && errorEmail === false && errorGender === false && errorMobileNumber === false &&
           errorAddress === false && errorPincode === false && errorBirthday === false &&
           errorDuplicateUsername === false && errorDuplicateEmail === false)
        {
            $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){    
                    $(this).parents("tr").remove();
                }
            });
            table_entry();  
            return true;
        }else{
            return false;
        }
    });
    
    /*
    * Function for Entering data to the table.
    * Takes all the data in the form and adds it to the table.
    */
    function table_entry()
    {
        var gender;
        if($("#formGenderMale").is(':checked'))
        {
        	gender = $("#formGenderMale").val();
        }
        else if($("#formGenderFemale").is(':checked'))
        {
        	gender = $("#formGenderFemale").val();
        }
        else{
        	gender = $("#formGenderOther").val();
        }
        var markup = "<tr><td> <input type='checkbox' name='record'> </td><td>"+
        $("#formName").val() +"</td><td>"+ $("#formEmail").val() + "</td><td>"+ gender +"</td><td>"+
        $('#formBirthday').val() +"</td><td>"+ $('#formMobileNumber').val() +"</td><td>"+
        $('#formAddress').val() +"</td><td>"+ $('#formPincode').val() +"</td><td>"+
        $('#formSelectCountry').val() +"</td><td>"+ $('#formSelectState').val() +"</td></tr>";
        $("table tbody").append(markup); 
    }
    
    /*
    * Function to delete a row from the table
    */
    $(".delete-row").click(function(){
        $("table tbody").find('input[name="record"]').each(function(){
            if($(this).is(":checked")){
                $(this).parents("tr").remove();
            }
        });
    });
    
    /*
    * Function to update a row in the table.
    */
    $(".update-row").click(function(){
        $("table tbody").find('input[name="record"]').each(function(){
            if($(this).is(":checked")){
                var x = $(this).parent().parent();
                var tableName = x.children("td:nth-child(2)");
                var tableEmail = x.children("td:nth-child(3)");
                var tableGender = x.children("td:nth-child(4)");
                var tableBirthday = x.children("td:nth-child(5)");
                var tableMobileNumber = x.children("td:nth-child(6)");
                var tableAddress = x.children("td:nth-child(7)");
                var tablePincode = x.children("td:nth-child(8)");
                var tableCountry = x.children("td:nth-child(9)");
                var tableState = x.children("td:nth-child(10)");
                $("#formName").val(tableName.html());
                $("#formEmail").val(tableEmail.html());
                $("input[name=gender]").val(tableGender.html());
                $("#formBirthday").val(tableBirthday.html());
                $("#formMobileNumber").val(tableMobileNumber.html());
                $("#formAddress").val(tableAddress.html());
                $("#formPincode").val(tablePincode.html());
                $("#formSelectCountry").val(tableCountry.html());
                $("#formSelectState").val(tableState.html());
            }
        });
    });
    
    /*
    * Function for Duplicate Username Validation.
    * Takes the table data as input.
    */
    function checkDuplicateUsername(){
        $("table tbody").find('input[name="record"]').each(function(){
            if($(this).is(':not(:checked)')){
                var x = $(this).parent().parent();
                var test = x.children("td:nth-child(2)");
                if($("#formName").val() === test.html())
                {
                    $("#duplicateUsernameErrorMessage").html("Username Already Exists");
                    $("#duplicateUsernameErrorMessage").show();
                    errorDuplicateUsername = true;
                }
                else if(errorDuplicateUsername === false)
                {
                    $("#duplicateUsernameErrorMessage").hide();
                }
            }
        });
    }
    
    /*
    * Function for Duplicate Email Validation.
    * Takes the table data as input.
    */
    function checkDuplicateEmail(){
        $("table tbody").find('input[name="record"]').each(function(){
            if($(this).is(':not(:checked)')){
                var x = $(this).parent().parent();
                var test = x.children("td:nth-child(3)");
                if($("#formEmail").val() === test.html())
                {
                    $("#duplicateEmailErrorMessage").html("Email Already Exists");
                    $("#duplicateEmailErrorMessage").show();
                    errorDuplicateEmail = true;
                }
                else if (errorDuplicateEmail === false)
                {
                    $("#duplicateEmailErrorMessage").hide();
                }
            }
        });
    }
});