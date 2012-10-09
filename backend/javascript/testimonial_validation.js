function testimonial_validation(form)
{


if(form.testimonial_writer.value == "")
{
alert("Please fill the Testimonial writer field.");
form.testimonial_writer.focus();
return (false);
}

}