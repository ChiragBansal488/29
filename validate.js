function validate(a) {
    if (blank(a)) return;
    
    if (illegalCharacter(a)) return;

    if (length(a)) return;
 
}

function blank(usr) {
   // <div id="validations"></div>
    try {
        if (usr.value == "") {
            error = "You didn't enter a phone number .\n";
            alert(error);
            return true;
        } else {
            return false;
        }
    } catch (error) {
       // var Username = document.getElementById("validations").innerHTML=error; //GET ID WITH VALUE
        console.log(error);
    }
}

function illegalCharacter(usr){
    var illegalCharacter = /\W/;
    try{
        if (illegalCharacter.test(usr.value)) {
             error = 1;
            
             error = "The username is not contain special characters.\n";
             alert(error);
             return true;
         }
         else{
            return false;
           
         }
     }
     catch(error)
     {
       // var Username = document.getElementById("validations").innerHTML=error.msg; //GET ID WITH VALUE
         console.log(error);
     }
    
    }
    

function length(usr) {
    try{
    if (usr.value.length!=10) {
        error = "length must be 10 digit.\n";
        alert(error);
        return true;
    } else {
        
        alert(" your number is registered" );
        return false;
    }
} catch (error) {
    console.log(error);
}
}










// <-----------------MAIN FUNCTION-------------------->
function validation()
{
try
{    blank()
    valid()
}
catch(error)
{
    document.getElementById('console').innerHTML = 
 "<h5 style='color:red'> Warning: </h5>" + error.message;
}
}

// <------------------------BLANK VALIDATE--------------------------->

function blank() {
var username = document.getElementById("usrname").value;
   
       
     if (username== "") {
        
         alert("Please Enter Username First");
        throw new Error('Username can not be Empty.');
    
       }
       return true;
    }
// <-------------------OTHER VALIDATION----------------------->
function valid()
{
    
   
    var Username = document.getElementById("usrname").value; 

  
   
 if (Username.search(/[0-9]/) == -1) 
{

    alert("Please enter one numeric value");
    throw  new Error("Please enter one numeric value");
 
}
else if (Username.search(/[A-Z]/) == -1)
{

    alert("Please enter one Capital Letter");
    throw  new Error ("Please enter one Capital Letter");

    
}
else if (Username.search(/[a-z]/) == -1)
{

  alert("Please enter one small Letter");
    throw  new Error ("Please enter one Small Letter");

    
}


else{
  
document.getElementById('usrname').innerHTML = "<h3 style='color:green'> Your username is: </h3>" + Username;
document.getElementById("file").submit();
return true;

}
}

