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
    let username = document.getElementById("usrname").value;
   
       
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



















//   function validation() {



//      var Username = document.getElementById("validations").value; //GET ID WITH VALUE
//      if (Username == '') {
//          error = 1;
//          alert("Please Enter Phone number !!");
//          return false;
//    }

//    else if (Username.length!=10) {
//          error = 1;
//         alert("PHONE NUMBER MUST BE  10 NUMBER ");
//         return false;
//     }

//      else {
//             alert("thanku for submit");

//          }

//      }
