




function test() {
    try {
      username();
    } catch (error) {
        document.getElementById('console').innerHTML =
            "<h3 style='color:red'> Error: </h3>" + error.message;
    }
}

// Global variable.
function username() {
    let username = document.getElementById("usrname").value;
   
       
     if (username== "") {
        
         alert("Please Enter Username First");
        throw new Error('Username can not be Empty.');
       }
    else
    {
        valid() 
    }

}
 

 

