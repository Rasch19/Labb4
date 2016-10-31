function searchsubmit() {
	var limit = document.getElementById("limit").value;
	var order = document.getElementById("order").value;
	var author = document.getElementById("searchbox").value;
	var oldurl = window.location.href.split("?");
	
	author = author.replace(" ", "_");
	
	if(author)
	{
		var url = oldurl[0] + '?limit=' + limit + '&order=' + order + '&author=' + author;
	}
	else
	{
		var url = oldurl[0] + '?limit=' + limit + '&order=' + order;
	}
	
	window.location.href = url;
}