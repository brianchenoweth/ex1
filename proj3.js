

$(document).ready(function() {
    $('input[name="name"]').focus();
    $('.subbut').on('click', function (e) {
        e.preventDefault();
        var params = "email="+$('#email').val();
        var url = "check_dup.php?"+params;
        $.get(url, dup_handler);

    });
    
});    

function dup_handler(response) {
    if(response == "dup")
        $('#status').text("ERROR, duplicate");
    else if(response == "OK") {
        $('form').serialize();
        $('form').submit();
        }
    else
        alert(response);
    }


function validateDate() {
    var dobmonth = document.getElementById("dobmonth").value;
    var dobday = document.getElementById("dobday").value;
    var dobyear = document.getElementById("dobyear").value;
    
    // now turn the three values into a Date object and check them
    var checkDate = new Date(dobyear, dobmonth-1, dobday);    
    var checkMonth = checkDate.getMonth()+1;
    var checkDay = checkDate.getDate();
    var checkYear = checkDate.getFullYear();
    
    if(dobmonth > 12) {
		alert("Invalid Month");
		return false;
	} 

if(dobmonth < 01) {
		alert("Invalid Month");
		return false;
	} 

if(dobday > 31) {
		alert("Invalid Day");
		return false;
	} 

if(dobday < 01) {
		alert("Invalid Day");
		return false;
	} 	

if(dobyear > 2000) {
		alert("Sorry, you're too young to run.");
		return false;
	} 

if(dobyear < 1910) {
		alert("Sorry grandpa, you're too old.");
		return false;
	} 

	if(dobday == checkDay && dobmonth == checkMonth && dobyear == checkYear){
    }
 	else
        {
        	alert("Invalid date" + checkDate.toDateString());
        	return false;         
        }
   						}



