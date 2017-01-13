/*
 * Title - User Registration form 
 * Author - Satyapriya Baral
 */

$(function() {
    $("#nameErrorMessage").hide();
    $("#newPasswordErrorMessage").hide();
    $("#retypePasswordErrorMessage").hide();
    $("#emailErrorMessage").hide();
    $("#mobileNumberErrorMessage").hide();
    $("#addressErrorMessage").hide();
    $("#pinodeErrorMessage").hide();
    $("#genderErrorMessage").hide(); 
    $("#birthdayErrorMessage").hide();
    
    var errorName = false;
    var errorNewPassword = false;
    var errorRetypePassword = false;
    var errorEmail = false;
    var errorMobileNumber = false;
    var errorAddress = false;
    var errorPincode = false;
    var errorGender = false;
    var errorBirthday = false;
    
    $("#formName").focusout(function(){
        checkName();
    });
    
    $("#formNewPassword").focusout(function(){
        checkNewPassword();
    });
    
    $("#formRetypePassword").focusout(function(){
        checkRetypePassword();
    });
    
    $("#formEmail").focusout(function(){
        checkEmail();
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
    
    //Username Validation
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
    
    //Password Validation
    function checkNewPassword(){
        var newPassword = $("#formNewPassword").val();
        var retypePassword = $("#formRetypePassword").val();
        if(( newPassword !=   retypePassword ) || (   newPassword.length < 5 ||   retypePassword.length < 5 ))
        {
            $("#retypePasswordErrorMessage").html("Password Error (should match and minimum of 5 charecters)");
            $("#newPasswordErrorMessage").html("Password Error (should match and minimum of 5 charecters)");
            $("#retypePasswordErrorMessage").show();
            $("#newPasswordErrorMessage").show();
            errorRetypePassword = true;
            errorNewPassword = true;
        }
        else
        {
            $("#retypePasswordErrorMessage").hide();
            $("#newPasswordErrorMessage").hide();
        }
    }
    
    //Password Validation
    function checkRetypePassword(){
        var   newPassword = $("#formNewPassword").val();
        var   retypePassword = $("#formRetypePassword").val();
        if((   newPassword !=   retypePassword ) || (   newPassword.length < 5 ||   retypePassword.length < 5 ))
        {
            $("#retypePasswordErrorMessage").html("Password Error (should match and minimum of 5 charecters)");
            $("#newPasswordErrorMessage").html("Password Error (should match and minimum of 5 charecters)");
            $("#retypePasswordErrorMessage").show();
            $("#newPasswordErrorMessage").show();
            errorRetypePassword = true;
            errorNewPassword = true;
        }
        else
        {
            $("#retypePasswordErrorMessage").hide();
            $("#newPasswordErrorMessage").hide();
        }
    }
    
    //Email Validation
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
    
    //Gender Validation
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
    
    //Birthday Validation
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
            $("birthdayErrorMessage").hide();
        }
    }
    
    //Mobile Number Validation
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
    
    //Address Validation
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
    
    //Pincode Validation
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
    //submit Function
    $("#userRegistrationForm").on('submit' , function(e){
        e.preventDefault();
        
        error_name = false;
        errorNewPassword = false;
        errorRetypePassword = false;
        errorEmail = false;
        errorGender = false;
        errorMobileNumber = false;
        errorAddress = false;
        errorPincode = false;
        errorGender = false;
        errorBirthday = false;
        
        checkName();
        checkNewPassword(); 
        checkRetypePassword();
        checkEmail();
        checkGender();
        checkMobileNumber();
        checkAddress();
        checkPincode();
        checkGender();
        checkBirthday();
        
        if(error_name === false && errorNewPassword === false && errorRetypePassword === false
           && errorMobileNumber === false && errorAddress === false && errorPincode === false)
        {
            table_entry();  
            return true;
        }else{
            return false;
        }
    });
    
    //Data Entry To Table
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
        $('#formBirthday').val() +"</td><td>"+ $('#formMobileNumber').val() +"</td><td>"+ $('#formAddress').val() +"</td><td>"+
        $('#formPincode').val() +"</td><td>"+ $('#formSelectCountry').val() +"</td><td>"+ $('#formSelectState').val() +"</td></tr>";
        $("table tbody").append(markup); 
    }
    
    //Delete Row
    $(".delete-row").click(function(){
        $("table tbody").find('input[name="record"]').each(function(){
            if($(this).is(":checked")){
                $(this).parents("tr").remove();
            }
        });
    });
    
    //Update
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
                $("table tbody").find('input[name="record"]').each(function(){
                    if($(this).is(":checked")){
                        $(this).parents("tr").remove();
                    }
                });
            }
        });
    });
});