function office_validation(form)
{


if(form.office_title.value == "")
{
alert("Please fill the Office title field.");
form.office_title.focus();
return (false);
}

}