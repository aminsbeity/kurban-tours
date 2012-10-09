function offer_validation(form)
{


if(form.offer_title.value == "")
{
alert("Please fill the Offer title field.");
form.offer_title.focus();
return (false);
}

if(form.destination_id.value == 0)
{
alert("Please Select the Destination id field.");
form.destination_id.focus();
return (false);
}

}