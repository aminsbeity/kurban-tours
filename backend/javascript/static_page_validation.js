function static_page_validation(form)
{


if(form.static_page_name.value == "")
{
alert("Please fill the Static page name field.");
form.static_page_name.focus();
return (false);
}

if(form.static_page_title.value == "")
{
alert("Please fill the Static page title field.");
form.static_page_title.focus();
return (false);
}

}