function product_validation(form)
{


if(form.product_name.value == "")
{
alert("Please fill the Product name field.");
form.product_name.focus();
return (false);
}

}