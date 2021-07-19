function formValidation()
{
    var w = document.forms["create_request"]["weight"].value;
    var span = document.getElementById("weight_span");
    if(w<1)
    {
        span.textContent = "Pickup Waste Weight should be 1kgs or more";
        span.style.color = "red";
        return false;
    }
    else
    {
        return true;
    }
    
}