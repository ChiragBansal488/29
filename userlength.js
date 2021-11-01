   
 
function  userlength() {
    try {
      length();
    } catch (error) {
        document.getElementById('console').innerHTML =
            "<h3 style='color:red'> Error: </h3>" + error.message;
    }
}

function length() {
    let username = document.getElementById("usrname").value;
   
       
    if (username.length < 6 || username.length > 15) 
 {   
    alert("NAME MUST BE GREATER THAN 6 AND SMALLER THAN 15");
    throw  new Error(" Username must be between 6 and 15 ");
       }
    

    else
    {
        validation(); 
    }

}
