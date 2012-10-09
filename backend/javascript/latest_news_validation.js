function latest_news_validation(form)
{


if(form.latest_news_title.value == "")
{
alert("Please fill the Latest news title field.");
form.latest_news_title.focus();
return (false);
}

}