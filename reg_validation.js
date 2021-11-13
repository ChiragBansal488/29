function valid() {
    try{
        verify_Null()
        validation_Name()
        EmailValidation()
        PhoneValidation()
        validation_Pass()
      
       
    }
    catch (error) 
    {
        document.getElementById('console').innerHTML = 
        "<h3 style='color:red'> Warning: </h3>" + error.message + "<a href='r.php'>Go and correct</a>";
        
     
    }

}
//<------------------Blank Validation----------------->//

function verify_Null(){

    var isValid = true;
    if(!document.getElementById('fn').value.trim().length){
         isValid = false;
         throw new Error("Please fill the firstname!!!");
    }

    else if(!document.getElementById('pwd').value.trim().length){
         isValid = false;
        throw new Error("Please fill the password!!!");
    }
   return isValid;
}


function validation_Name()
{
    var user = document.getElementById('fn').value.trim();
 

    var isValid = true;
    var illegalChars = /\W/; // allow letters, numbers, and underscores

    if ((user.length < 5) || (user.length > 15)) {
        isValid = false;
        throw new Error("The username is the wrong length.\n");

    } 
    return isValid;
}


function EmailValidation(){
    var email =document.getElementById("em");
    var isValid = true;

   var mail_format = /^([a-zA-Z0-9])(([a-zA-Z0-9])*([\._\+-])*([a-zA-Z0-9]))*@(([a-zA-Z0-9\-])+(\.))+([a-zA-Z]{2,4})+$/

if(!email.value.match(mail_format)){
    isValid= false;
    throw new Error("please fill the correct email");
}
return isValid;

}

function  PhoneValidation()
{     var isValid = true;
      var phone_formate=/^[7-9][0-9]{9}$/;
    var phone =document.getElementById("mn");
    if(!phone.value.match(phone_formate)){
        isValid= false;
        throw new Error("please fill the correct Phone number");
    }
    return isValid;


}

//    <-------------PASSWORD VALIDATION---------------------->


function validation_Pass(){
    var isValid = true;
    var pass = document.getElementById("pwd").value.trim();

     if ((pass.length < 5) || (pass.length > 25)) {
        isValid = false;
        throw new Error("The password is the wrong length.\n");

    }

    else if (!/[A-Z]/.test(pass)) {
        isValid = false;
        throw new Error( "password must contain one capital letter\n");

    }

    else if (!/[a-z]/.test(pass)) {
        isValid = false;
        throw new Error( "password must contain one small letter\n");

    }

    else if (!/[0-9]/.test(pass)) {
        isValid = false;
        throw new Error("password must contain one numeric\n");

    }

    else if (!/\W/.test(pass)) {
        isValid = false;
        throw new Error("password must contain one special character\n");

    }
   
    return isValid;

}