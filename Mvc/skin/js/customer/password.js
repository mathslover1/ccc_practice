function myfun(){
    var a =document.getElementById("npass").value;
    var b =document.getElementById("cpass").value;
    var c =document.getElementById("pass").value;
    if(a==""){
       document.getElementById('mess').innerHTML="***Please New Enter Password or Enter old password again***";
       return false;
    }
    if(c==""){
       document.getElementById('mess').innerHTML="***Old Password can not be empty***";
       return false;
    }
    if(a!=b){
       document.getElementById('mess').innerHTML="***password not same***";
       return false;
    }
   } 