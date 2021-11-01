function numeric(usr){

    if(!/^[0-9]+$/.test(usr.value)) {

       error ("The username all numeric value.\n");
      alert(error);
      return false;
       
}
else {
  alert(" your number is registered" );

}
}