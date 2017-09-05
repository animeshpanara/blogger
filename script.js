function handleHeight(textarea,height){
	
	textarea.style.height=height+'px';
	textarea.style.height=((height/2)+textarea.scrollHeight)+'px';
	
}

//function hello(){
//	alert("hello");
//}
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById('profilepic').setAttribute('src',e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }

    if(input.value!="")
    {
    	var error=document.getElementsByClassName(errorClasses['null']+'Of'+'uploadButton')[0];
    	if(error)
    		error.parentElement.removeChild(error);
    }
    else
    {
    	document.getElementById('profilepic').src='userpics/default.png';
    }
}
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
var modal = document.getElementById('id02');
var modal1 = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}
var cnt=0;
function dropDownShower() {
	if(cnt%2==0)
	{
		document.getElementsByClassName('dropDown')[0].style.display='block';
		document.getElementsByClassName('dropDownBack')[0].style.display='block';
		cnt=(cnt+1)%2;
	}
	else if(cnt%2==1)
	{
		document.getElementsByClassName('dropDown')[0].style.display='none';
		document.getElementsByClassName('dropDownBack')[0].style.display='none';
		cnt=(cnt+1)%2;
	}
}

function hideDropDown(){
	cnt++;
	document.getElementsByClassName('dropDown')[0].style.display='none';
	document.getElementsByClassName('dropDownBack')[0].style.display='none';
}
