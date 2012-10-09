function product_service_validation(form)
{


if(form.product_service_title.value == "")
{
alert("Please fill the Product service title field.");
form.product_service_title.focus();
return (false);
}

if(form.product_id.value == 0)
{
alert("Please Select the Product id field.");
form.product_id.focus();
return (false);
}

}