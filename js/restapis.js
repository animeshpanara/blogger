
function deletePost(blogid)
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		//completeDeleting();
		var deletingElement=document.getElementById('deletingElement');
		deletingElement.parentElement.removeChild(deletingElement);
	}
	};
	xhttp.open("GET", "ajax/deletePost.php?blogid="+blogid, true);
	xhttp.send();
}

function usefullPost(blogid,element)
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
	 element.parentElement.innerHTML = this.responseText;
	 // console.log(this.responseText);
	}
	};
	xhttp.open("GET", "ajax/like.php?blogid="+blogid, true);
	xhttp.send();
}

function wastefullPost(blogid,element)
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
	 element.parentElement.innerHTML = this.responseText;
	 // console.log(this.responseText);
	}
	};
	xhttp.open("GET", "ajax/dislike.php?blogid="+blogid, true);
	xhttp.send();
}

function followUser(bloggerName,userName)
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		var resp=this.responseText;
		document.getElementsByClassName('followerPanel')[0].innerHTML=resp.split(':')[1];
		document.getElementsByClassName('followParent')[0].innerHTML=resp.split(':')[0];
	}
	};
	xhttp.open("GET", "ajax/follow.php?bloggerName="+bloggerName+"&userName="+userName, true);
	xhttp.send();
}
function commentsin(blogid){
	var child=event.target;
	var parent=child.parentElement.parentElement;
	var grandparent=parent.parentElement;
	var comment=parent.getElementsByClassName('commentInput')[0].value;
	if(comment=='') return ;
	parent.getElementsByClassName('commentInput')[0].value="";
	var data="comment="+comment+"&blogid="+blogid;
	var xhttp=new XMLHttpRequest();
	xhttp.onreadystatechange=function(){
	if (this.readyState == 4 && this.status == 200) {
		console.log(this.responseText);
		var div=document.createElement('div');
		div.className='w3-row';
		div.innerHTML=this.responseText;
		grandparent.insertBefore(div,parent);
	}
	};
	xhttp.open("POST", "ajax/comment.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(data);

}

function searchUsers(userName){
	
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     document.getElementsByClassName("searchResult")[0].innerHTML = this.responseText;
	     // console.log(this.responseText);
	    }
	  };
	  xhttp.open("GET", "ajax/searchBlogger.php?blogger="+userName, true);
	  xhttp.send();
}


// function commentPlz(blogid){
// 	alert(blogid);
// 	var
// 	//var comment=event.target.parentElement.getElementsByClassName('commentInput')[0].value;
// 	//comment="comment="+comment;
// 	//console.log(commentJSON);

// 	//var xhttp = new XMLHttpRequest();
// 	//xhttp.onreadystatechange = function() {
// 	//if (this.readyState == 4 && this.status == 200) {
// 	//	console.log(this.responseText);
// 	//}
// 	//};
// 	//xhttp.open("POST", "ajax/comment.php", true);
// 	//xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// 	//xhttp.send(comment);
// }