function valid() {
    try{
        blank()
        validation_Name()
        EmailValidation()
        PhoneValidation()
        validation_Pass()
      
       
    }
    catch (error) 
    {
        document.getElementById('console').innerHTML = 
        "<h3 style='color:red'> Warning: </h3>" + error.message + "<a href='r.php'>Fill the correct Detail</a>";
     
    }

}
//<------------------Blank Validation----------------->//

function blank(){

    if(!document.getElementById('fn').value.trim().length){
        alert("Please fill the first name");
         throw new Error("Please fill the firstname!!!");
    }

    else if(!document.getElementById('pwd').value.trim().length){
        alert("Please fill the Password");
        throw new Error("Please fill the password!!!");
    }

}


function validation_Name()
{
    var user = document.getElementById('fn').value.trim();
 



    if ((user.length < 5) || (user.length > 15)) {
        alert("The username is the wrong length.");
        throw new Error("The username is the wrong length.\n");

    } 

}


function EmailValidation(){
    var email =document.getElementById("em");


   var mail_format = /^([a-zA-Z0-9])(([a-zA-Z0-9])*([\._\+-])*([a-zA-Z0-9]))*@(([a-zA-Z0-9\-])+(\.))+([a-zA-Z]{2,4})+$/

if(!email.value.match(mail_format)){
    alert("Please fill the correct email");
    throw new Error("please fill the correct email");
}


}

function  PhoneValidation()
{     
      var phone_formate=/^[0-9][0-9]{9}$/;
    var phone =document.getElementById("mn");
    if(!phone.value.match(phone_formate)){
        alert("Please fill the correct phone number");
        throw new Error("please fill the correct Phone number");
    }
  


}

//    <-------------PASSWORD VALIDATION---------------------->


function validation_Pass(){
  
    var pass = document.getElementById("pwd").value.trim();

     if (pwd.length < 6 || pwd.length > 25) {
        alert("Password MUST BE GREATER THAN 6 AND SMALLER THAN 25");
        throw new Error("Password MUST BE GREATER THAN 6 AND SMALLER THAN 25\n");

    }

    else if ((/[A-Z]/) == -1) {
        alert("password must contain one Capital character");
        throw new Error( "password must contain one capital letter\n");

    }

    else if ((/[a-z]/) == -1){
        alert("password must contain one small character");
        throw new Error( "password must contain one small letter\n");

    }

    else if ((/[0-9]/) == -1){
        alert("password must contain one numeric value");
        throw new Error("password must contain one numeric\n");

    }
    else if ((/\W/) == -1) {
     alert("password must contain one special character");
        throw new Error("password must contain one special character\n");

    }
   
  return true;

}