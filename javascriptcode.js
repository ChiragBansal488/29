

function validation()
{
try
{
    valid();
}
catch(error)
{
    document.getElementById('console').innerHTML = 
 "<h5 style='color:red'> Warning: </h5>" + error.message;
}
}

function valid()
{
    
   
    var Username = document.getElementById("usrname").value; 
    //  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{1,4})+$/; //REGULAR EXPRESSION
   
 if (Username.search(/[0-9]/) == -1) 
{
    // var valid =true;
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
// valid =false;
  alert("Please enter one small Letter");
    throw  new Error ("Please enter one Small Letter");

    
}


else{
  
document.getElementById('usrname').innerHTML = "<h3 style='color:green'> Your username is: </h3>" + Username;
document.getElementById("file").submit();

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
