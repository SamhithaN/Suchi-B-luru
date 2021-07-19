function validateForm()
{
    var fname = document.forms["citizen_signup"]["fname"].value;
    var lname = document.forms["citizen_signup"]["lname"].value ;
    var contact =  document.forms["citizen_signup"]["phone"].value;
    var email =  document.forms["citizen_signup"]["email"].value;
    var pw1 = document.forms["citizen_signup"]["password"].value; 
    var pw2 = document.forms["citizen_signup"]["confirm"].value;
    var spanFname = document.getElementById("span_fname");
    var spanLname = document.getElementById("span_lname");
    var spanEmail = document.getElementById("span_email");
    var spanContact = document.getElementById("span_contact");
    var spanMatch = document.getElementById("match");
    if(isAlpha(fname)==true)
    {
        //document.getElementById("span_fname").value="";
        $("span_fname").html("");
        if(isAlpha(lname)==true)
        {
            document.getElementById("span_lname").value="";
            if(isMobileNumber(contact)==true)
            {
                document.getElementById("span_contact").value="";
                if(isEmail(email)==true)
                {
                 
                    if(pw1 == pw2)  
                    {   
                        document.getElementById("match").value="";
                        return true;
                    } 
                    else 
                    {  
                        document.forms["citizen_signup"]["password"].value = "";
                        document.forms["citizen_signup"]["confirm"].value = "";
                        spanMatch.textContent = "Mismatch"
                        spanMatch.style.color = "red"
                        document.forms["citizen_signup"]["confirm"].focus();
                        return false;
                    
                    } 
                    
                }
                else
                {
                    spanEmail.textContent = "Invalid Email ID"
                    spanEmail.style.color = "red"
                    document.forms["citizen_signup"]["email"].focus();
                    return false;
                }
            }
            else
            {
                
                
                spanContact.textContent = "Invalid Mobile Number."
                spanContact.style.color = "red"
                document.forms["citizen_signup"]["phone"].focus();
                return false;
            }
        }
        else
        {
            spanLname.textContent = "Must contains alphabets only"
            spanLname.style.color = "red"
            document.forms["citizen_signup"]["lname"].focus();
            return false;
        }
    } 
    else 
    {
        spanFname.textContent = "Must contain alphabets only"
        spanFname.style.color = "red"
        document.forms["citizen_signup"]["fname"].focus();
        return false;
    }
      
    
    
}

function Toggle() {
    var temp = document.getElementById("password");
    var ctemp = document.getElementById("confirm");
    if (temp.type === "password" && ctemp.type ==="password") {
        temp.type = "text";
        ctemp.type = "text";
    }
    else 
    {
        temp.type = "password";
        ctemp.type = "password";
    }
}

function isAlpha(name)
{
    var regex = /^[a-zA-Z]+$/;
    if(regex.test(name) == true)
    {
        
        return true;
    }
    
    else
    {
        return false;
    }
}

function isMobileNumber(contact)
{
    var regex = /^[6-9][0-9]{9}$/;
    if(regex.test(contact)==true)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function isEmail(email)
{
    //var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(regex.test(email)==true)
    {
        return true;
    }
    else
    {
        return false;
    }
    
}





