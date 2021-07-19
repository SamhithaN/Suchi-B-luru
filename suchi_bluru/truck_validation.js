function formValidation()
{
  //  var vno = document.forms["truck"]["vehicle"].value;
    var vcap = document.forms["truck"]["capacity"].value;
    /*if(isVehicle(vno)==true)
    {*/
        if(isCapacity(vcap)==true)
        {
            return true;
        }
        else
        {
            var span_cap = document.getElementById("cap_span");
            span_cap.textContent = "Vehicle Capacity should be 100kgs or more";
            span_cap.style.color = "red";
            return false;
        }
    
   /* else
    {
        var span_veh = document.getElementById("veh_span");
        span_veh.textContent = "Vehicle Capacity should be 100kgs or more";
        span_veh.style.color = "red";
        return false;
    } */
        
  
}

/*function isVehicle(number)
{
    var regex = /[kK][aA][0-9][0-9][a-zA-z]{1,2}[0-9]{4}$/;
    alert(regex.test(number))
    if(regex.test(number)==true)
    {
        return true;
    }
    else
    {
        return false;
    }
} */

function isCapacity(cap)
{
    if(cap>=100)
    {
        return true;
    }
    else
    {
        return false;
    }
}