function partner_validation(form)
{


if(form.partner_name.value == "")
{
alert("Please fill the Partner name field.");
form.partner_name.focus();
return (false);
}

}