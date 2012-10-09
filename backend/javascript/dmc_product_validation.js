function dmc_product_validation(form)
{


if(form.dmc_product_title.value == "")
{
alert("Please fill the Dmc product title field.");
form.dmc_product_title.focus();
return (false);
}

}