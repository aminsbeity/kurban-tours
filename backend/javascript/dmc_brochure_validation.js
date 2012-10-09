function dmc_brochure_validation(form)
{


if(form.dmc_brochure_title.value == "")
{
alert("Please fill the Dmc brochure title field.");
form.dmc_brochure_title.focus();
return (false);
}

}