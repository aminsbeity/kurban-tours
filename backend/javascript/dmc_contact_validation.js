function dmc_contact_validation(form)
{


if(form.dmc_contact_title.value == "")
{
alert("Please fill the Dmc contact title field.");
form.dmc_contact_title.focus();
return (false);
}

}