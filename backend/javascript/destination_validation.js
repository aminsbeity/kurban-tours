function destination_validation(form)
{


if(form.destination_name.value == "")
{
alert("Please fill the Destination name field.");
form.destination_name.focus();
return (false);
}

if(form.destination_title.value == "")
{
alert("Please fill the Destination title field.");
form.destination_title.focus();
return (false);
}

}