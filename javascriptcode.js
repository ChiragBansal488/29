









function test()
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
   
     if (Username == '')
{
    error = 1;
    alert("Please Enter Username !!");
    
    throw new Error('please provide an username');
    
}
else if (Username.length < 6 || Username.length > 15) 
{
    error = 1;
    alert("NAME MUST BE GREATER THAN 6 AND SMALLER THAN 15");
    throw  new Error(" Username must be between 6 and 15 ");
}
else if (Username.search(/[0-9]/) == -1) 
{
    error = 1;
    alert("Please enter one numeric value");
    throw  new Error("Please enter one numeric value");
}
else if (Username.search(/[A-Z]/) == -1)
{
    error = 1;
    alert("Please enter one Capital Letter");
    throw  new Error ("Please enter one Capital Letter");
}


else{
  
document.getElementById('usrname').innerHTML = "<h3 style='color:green'> Your username is: </h3>" + Username;
alert("you registered");
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
