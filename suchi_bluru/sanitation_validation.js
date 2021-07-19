function formValidation()
{
    var worker_name = document.forms["sanitation_worker"]["fullname"].value;
    var span_worker = document.getElementById("worker_span");
    var contact_no = document.forms["sanitation_worker"]["contact"].value;
    var span_contact = document.getElementById("contact_span");
    if(isAlpha(worker_name)==true)
    {
        span_worker.value = " ";
        if(isMobileNumber(contact_no)==true)
        {
            return true;
        }
        else
        {
            span_contact.textContent = "Invalid Mobile Number";
            span_contact.style.color = "red";
            return false;
        }
    }
    else
    {
        span_worker.textContent = "Must contain alphabets only";
        span_worker.style.color = "red";
        return false;
    }
}

function isAlpha(name)
{
    var regex = /^[a-zA-Z]+$/;
    
    if(regex.test(name)==true)
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
    //alert(regex.test(conatct));
    if(regex.test(contact)==true)
    {
        return true;
    }
    else
    {
        return false;
    }
   
}