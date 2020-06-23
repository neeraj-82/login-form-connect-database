document.querySelector(".sign").addEventListener("click",validation);

function validation()
{
    var username=document.querySelector(".user").value;
    var email=document.querySelector(".mail").value;
    var password=document.querySelector(".pass").value;
    var confirm=document.querySelector(".con-pass").value;

    var u=/^[a-z A-Z \.]{2,20}$/;
    var p=/^[a-z A-Z]+$/;
    var e=/^([\w \.  ]{2,30})@([a-z]{2,10}).([a-z]{2,5})?.([a-z]{2,5})$/;
    if(username.trim()=="")
    {
        document.querySelector(".warn-user").innerHTML="**Please! enter the username";
        return false;
    }
    if(!u.test(username))
    {
        document.querySelector(".warn-user").innerHTML="**Please enter only character";
        return false;
    }
    if(email.trim()=="")
    {
        document.querySelector(".warn-mail").innerHTML="**Please! enter the e-mail";
        return false;
    }
    if(!e.test(email))
    {
        document.querySelector(".warn-mail").innerHTML="invalid email";
        return false;
    }
    if(password.trim()=="")
    {
        document.querySelector(".warn-pass").innerHTML="**Please! enter the password";
        return false;
    }
    if(password.trim().length<7)
    {
        document.querySelector(".warn-pass").innerHTML="**Please! enter at least 8 letter,symbol,number";
        return false;
    }
    if(p.test(password))
    {
        document.querySelector(".warn-pass").innerHTML="**Enter a strong password! Mix up all characters ,letters and specila symbol";
        return false;   
    }

    if(confirm=="")
    {
        document.querySelector(".warn-con").innerHTML="**Please! enter the confirm password";
        return false;
    }
    if(confirm!=password)
    {
        document.querySelector(".warn-con").innerHTML="**wrong password";
        return false;
    }

}

document.querySelector(".user").addEventListener("blur",warn_user);
function warn_user()
{
    var username=document.querySelector(".user").value;
    if(username=="")
    {
        document.querySelector(".warn-user").innerHTML="**Please! enter the username";
    }
}

document.querySelector(".mail").addEventListener("blur",warn_mail);
function warn_mail()
{
    var username=document.querySelector(".mail").value;
    if(username=="")
    {
        document.querySelector(".warn-mail").innerHTML="**Please! enter the e-mail";
    }
}
document.querySelector(".pass").addEventListener("blur",warn_pass);
function warn_pass()
{
    var password=document.querySelector(".pass").value;
    if(password=="")
    {
        document.querySelector(".warn-pass").innerHTML="**Please! enter the password";
    }
}
document.querySelector(".con-pass").addEventListener("blur",warn_con);
function warn_con()
{
    var password=document.querySelector(".con-pass").value;
    if(password=="")
    {
        document.querySelector(".warn-con").innerHTML="**Please! enter the confirm-password";
    }
}

document.querySelector(".user").addEventListener("keyup",warn_key);

function warn_key()
{
    var username=document.querySelector(".user");
    
    var u=/^([a-z A-Z \.]{2,20})$/;

  
    if(u.test(username.value))
    {
        document.querySelector(".warn-user").innerHTML="";
    }
    if(!u.test(username.value))
    {
        document.querySelector(".warn-user").innerHTML="**Please! enter only characters";
    }
}

document.querySelector(".mail").addEventListener("keyup",warnmail);

function warnmail()
{
    var mail= document.querySelector(".mail");
    var e=/^([\w \.  ]{2,30})@([a-z]{2,10}).([a-z]{2,5})?.([a-z]{2,5})$/;

    if(e.test(mail.value))
    {
        document.querySelector(".warn-mail").innerHTML="";
    }
    if(!e.test(mail.value))
    {
        document.querySelector(".warn-mail").innerHTML="**invalid email";
    }

}

document.querySelector(".pass").addEventListener("keyup",warnpass);

function warnpass()
{
    var password= document.querySelector(".pass");
    var p=/^([a-z A-Z \. \d ]+)$/;

    if(p.test(password.value))
    {
        document.querySelector(".warn-pass").innerHTML="";
    }

}
document.querySelector(".con-pass").addEventListener("keyup",warncon);

function warncon()
{
    var confirm= document.querySelector(".con-pass").value;
    var password= document.querySelector(".pass").value;
    

    if(confirm==password)
    {
        document.querySelector(".warn-con").innerHTML="";
    }

}
