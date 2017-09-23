<?php


function process_parameters() {
	global $bad_chars;
	$params = array();
	$params[] = trim(str_replace($bad_chars, "",$_POST['fname'])); //0
	$params[] = trim(str_replace($bad_chars, "",$_POST['mname'])); //1
	$params[] = trim(str_replace($bad_chars, "",$_POST['lname'])); //2
	$params[] = trim(str_replace($bad_chars, "",$_POST['address1'])); //3
	$params[] = trim(str_replace($bad_chars, "",$_POST['address2'])); //4
	$params[] = trim(str_replace($bad_chars, "",$_POST['city'])); //5
	$params[] = trim(str_replace($bad_chars, "",$_POST['state'])); //6
	$params[] = trim(str_replace($bad_chars, "",$_POST['zip'])); //7
	$params[] = trim(str_replace($bad_chars, "",$_POST['area_phone'])); //8
	$params[] = trim(str_replace($bad_chars, "",$_POST['email'])); //9
	$params[] = trim(str_replace($bad_chars, "",$_POST['gender'])); //10
	$params[] = trim(str_replace($bad_chars, "",$_POST['dobmonth'])); //11
	$params[] = trim(str_replace($bad_chars, "",$_POST['dobday'])); //12
	$params[] = trim(str_replace($bad_chars, "",$_POST['dobyear'])); //13
	$params[] = trim(str_replace($bad_chars, "",$_POST['experience'])); //14
	$params[] = trim(str_replace($bad_chars, "",$_POST['category'])); //15
	$params[] = trim(str_replace($bad_chars, "",$_POST['medical'])); //16
	$params[] = trim(str_replace($bad_chars, "",$_POST['prefix_phone'])); //17
	$params[] = trim(str_replace($bad_chars, "",$_POST['phone'])); //18
	$params[] = trim(str_replace($bad_chars, "", $_FILES['file']['name'])); // 19
	return $params;
}

function validate_data($params) {
	$msg = "";
	if(strlen($params[0]) == 0)
		$msg .= "Please enter your first name<br /> ";
	if(strlen($params[2]) == 0)
		$msg .= "Please enter your last name<br />";
	if(strlen($params[3]) == 0)
		$msg .= "Please enter your address<br />";
	if(strlen($params[5]) == 0)
	$msg .= "Please enter a city<br />";
	if(strlen($params[6]) == 0)
		$msg .= "Please enter a state<br />";
		elseif(!checkState($params[6]))
		$msg .= "Invalid state<br />";
	if(strlen($params[7]) == 0)
		$msg .= "Please enter a zip code<br />";
		elseif(!is_numeric($params[7]))
		$msg .= "Zip code must only contain numbers<br />";
		elseif(strlen($params[7]) != 5)
		$msg .= "Zip code must be 5 digits in length<br />";
	if(strlen($params[8]) == 0)
		$msg .= "Please enter an area code<br />";
		elseif(strlen($params[8]) != 3)
		$msg .= "Area code must be 3 digits<br />";
		elseif(!is_numeric($params[8]))
		$msg .= "Area code must be numbers<br />";
	if(strlen($params[17]) == 0)
		$msg .= "Please enter the prefix of your phone<br />";
		elseif(strlen($params[17]) != 3)
		$msg .= "Prefix of phone must be 3 digits<br />";
		elseif(!is_numeric($params[17]))
		$msg .= "Prefix of phpne number must pnly contain numbers<br />";
	if(strlen($params[18]) == 0)
		$msg .= "Please enter a phone number<br />";
		elseif(strlen($params[18]) != 4)
		$msg .= "Phone number must be 4 digits<br />";
		elseif(!is_numeric($params[18]))
		$msg .= "Phone number must be numbers<br />";	
	if(strlen($params[9]) == 0)
		$msg .= "Please enter an email<br />";
		elseif(!filter_var($params[9], FILTER_VALIDATE_EMAIL))
		$msg .= "Invalid email, please enter another<br />";
	if(empty($params[10]))  
        $msg .= "Please select a gender <br />";
	if(strlen($params[11]) == 0)
	$msg .= "Please enter the month you were born in<br />";
		elseif(!is_numeric($params[11]))
		$msg .= "Month must only be numbers<br />";
		elseif(strlen($params[11]) != 2)
		$msg .= "Month must be 2 digits<br />";
	if(strlen($params[12]) == 0)
	$msg .= "Please enter the day you were born on<br />";
		elseif(!is_numeric($params[12]))
		$msg .= "Day must only be numbers<br />";
		elseif(strlen($params[12]) != 2)
		$msg .= "Day must be 2 digits<br />";
	if(strlen($params[13]) == 0)
	$msg .= "Please enter the year you were born in<br />";
		elseif(!is_numeric($params[13]))
		$msg .= "Year must only be numbers<br />";
		elseif(strlen($params[13]) != 4)
		$msg .= "Year must be 4 digits<br />";
	if(empty($params[14]) ) 
        $msg .= "Please select an experience level <br />";
	if(empty($params[15]) ) 
        $msg .= "Please select a category <br />";
	if(strlen($params[16]) == 0)
	$msg .= "Please enter 'none' if no medical conditions apply<br />";
	//if(empty($_FILES['file']['name']))
	//$msg .= "Please upload a photo<br />";
	if($msg) {
		write_form_error_page($msg);
		exit;
	}
	
}

function write_form_error_page($msg) {
	write_header();
	echo "<h2>Sorry, an error occured<br />",$msg,"</h2>";
	write_form();
	write_footer();
}

function write_form() {
print <<<ENDBLOCK
    <h1>SDSU Marathon Sign Up</h1>

<div id ="navbar">
	<ul>
		<li><a href="index.html">Home</a></li>
		<li><a href="signup.html">Sign Up</a></li>
	</ul>
</div> 
<div id="field">
<fieldset>
	<legend>Runner Information</legend>
		<form
		name="runner"
		method="post"
		action="process_req.php
		enctype="multipart/form-data">
				<label for ="fname">First Name:</label>
				<input type="text" name="fname" value="$_POST[fname]" pattern ="[a-zA-Z' -]{1,30}" maxlength="30" placeholder="John" title="Please enter only letters" size="30" id="fname" required/>

				<label for="mname">Middle Name:</label>
				<input type="text" name="mname" value="$_POST[mname]" pattern ="[a-zA-Z' -]{1,30}" placeholder="(If Applicable)" title="Please enter only letters" maxlength="30" size="30" id="mname"/>

				<label for="lname">Last Name:</label>
				<input type="text" name="lname" value="$_POST[lname]" pattern ="[a-zA-Z' -]{1,30}" maxlength="30" placeholder="Doe" title="Please enter only letters" size="30" id="lname" required/><br/>

				<label for="address1">Address 1:</label>
				<input type="text" name="address1" value="$_POST[address1]" pattern ="[a-zA-Z-'.# 0-9]{1,40}" placeholder="1234 Main St." title="Please enter a valid address" size="40" id="address1" required/>

				<label for="address2">Address 2:</label>
				<input type="text" name="address2" value="$_POST[address2]" pattern ="[a-zA-Z-'.# 0-9]{1,40}" placeholder="(If Applicable)" title="Please enter a valid address" size="40" id="address2"/><br/>

				<label for="city">City:</label>
				<input type="text" name="city" value="$_POST[city]" pattern="[a-zA-z ]{1,30}" placeholder="San Diego" title="Please enter only letters" size="30" id="city" required/>

				<label for="state">State:</label>
				<input type="text" name="state" value="$_POST[state]" pattern="[a-zA-z]{1,15}" placeholder="California" title="Please enter only letters" size="15" id="state" required/>

				<label for="zip">Zipcode:</label>
				<input type="text" name="zip" value="$_POST[zip]" pattern="[0-9]{5}" placeholder="12345" title="Please enter a valid 5 digit U.S. zipcode" size="10" id="zip" required/><br/>
			
				<label for="primaryphone">Primary Phone:</label>
            	<input type="text" name="area_phone" value="$_POST[area_phone]" id="primaryphone" size="3" maxlength="3" pattern="[0-9]+" required />  &nbsp;&nbsp;
            	<input type="text" name="prefix_phone" value="$_POST[prefix_phone]" size="3" maxlength="3" pattern="[0-9]+" required /> &nbsp;-&nbsp;
                <input type="text" name="phone" value="$_POST[phone]" size="4" maxlength="4" pattern="[0-9]+" required />

				<label for="email">Email Address:</label>
				<input type="email" name="email" id="email" value="$_POST[email]" placeholder="JohnDoe@example.com" title ="Please enter a valid email address" size="40" id="email" required/>

ENDBLOCK;
	$gender_choice = array("male","female","other");
	echo "<label for='gender'>Gender:</label>";
		foreach($gender_choice as $item) {
			echo "<input type ='radio' name='gender' value='$item'";
			if($item == $_POST[gender])
				echo " checked='checked'";
			echo " />$item";
		}
		echo "<br />";
	

print <<<ENDBLOCK
	<label for="dob">Date of Birth:</label>
	<input type="text" name="dobmonth" value="$_POST[dobmonth]" placeholder="MM" size="3" maxlength="2" id="dobmonth" required/>
	<input type="text" name="dobday" value="$_POST[dobday]" placeholder="DD" size="3" maxlength="2" id="dobday" required/>
	<input type="text" name="dobyear" value="$_POST[dobyear]" placeholder="YYYY" size="4" maxlength="4" id="dobyear" min="1900" max="2012" required/>
ENDBLOCK;
	echo "<label for='experience'>Experience:</label>";
	$experience_choice = array("novice","experienced","expert");
		foreach($experience_choice as $item) {
			echo "<input type ='radio' name='experience' value='$item'";
			if($item == $_POST[experience])
				echo " checked='checked'";
			echo "/> $item";
		}
		echo "<br />";
	echo "<label for='category'>Category:</label>";
	$category_choice = array("teen","adult","senior");
		foreach($category_choice as $item) {
			echo "<input type ='radio' name='category' value='$item'";
			if($item == $_POST[category])
				echo " checked='checked'";
			echo " />$item";
		}
		echo "<br />";
print <<<ENDBLOCK
		
		<label for="photoname">Photo Name:</label>					
				<input type = "text" name = "photoname" value="$_POST[photoname]" placeholder="Name your photo" size= "24" />

		<label for="fileupload">Photo Upload:</label>
					<input type ="file" name="file"/> 
					<br/>

		<label for="medical">Medical Conditions:</label><br/>
		<textarea rows="5" cols="95" name="medical" value="$_POST[medical]" id="medical"> </textarea>

		<div class="buttons">
				<input type="reset"/>
				<input type="submit" value="Submit" class="subbut"  />

			</div>

		</form>
		</fieldset>
ENDBLOCK;
}

function checkState($params){
 	$stateList = array("Alabama","alabama","AL","Alaska","alaska","AK","Arizona","arizona","AZ","Arkansas","arkansas","AR","California","california","CA","Colorado","colorado","CO","Connecticut","connecticut","CT","Delaware","delaware","DE","District of Columbia","district of columbia","DC","Florida","florida","FL","Georgia","georgia","GA","Hawaii","hawaii","HI","Idaho","idaho","ID","Illinois","illinois","IL","Indiana","indiana","IN","Iowa","iowa","IA","Kansas","kansas","KS","Kentucky","kentucky","KY","Louisiana","louisiana","LA","Maine","maine","ME","Maryland","maryland","MD","Massachusetts","massachusetts","MA","Michigan","michigan","MI","Minnesota","minnesota","MN","Mississippi","mississippi","MS","Missouri","missouri","MO","Montana","montana","MT","Nebraska","nebraska","NE","Nevada","nevada","NV","New Hampshire","new hampshire","NH","New Jersey","new jersey","NJ","New Mexico","new mexico","NM","New York","new york","NY","North Carolina","north carolina","NC","North Dakota","north dakota","ND","Ohio","ohio","OH","Oklahoma","oklahoma","OK","Oregon","oregon","OR","Pennsylvania","pennsylvania","PA","Rhode Island","rhode island","RI","South Carolina","south carolina","SC","South Dakota","south dakota","SD","Tennessee","tennessee","TN","Texas","texas","TX","Utah","utah","UT","Vermont","vermont","VT","Virginia","virginia","VA","Washington","washington","WA","West Virginia","west virginia","WV","Wisconsin","wisconsin","WI","Wyoming","wyoming","WY");
	for($i = 0 ; $i < count($stateList) ; $i++){
     if($stateList[$i] == $params)
        return true;
   }
   return false;

}

function store_data_in_db($params) {
    # get a database connection
    $db = get_db_handle();  ## met

    $phone = $params[8].'-'.$params[17].'-'.$params[18];

    $dob = $params[11].'-'.$params[12].'-'.$params[13];
    ##############################################################

##OK, duplicate check passed, now insert
    #$sql = "Select * from person;";
    #I THINK YOU SHOULD CHANGE THIS
    $sql = "INSERT INTO person(fname,mname,lname,address1,address2,city,state,zip,phone,email,gender,dob,experience,category,medical,image)".
    
    "VALUES('$params[0]','$params[1]','$params[2]','$params[3]','$params[4]','$params[5]','$params[6]','$params[7]','$phone','$params[9]','$params[10]','$dob','$params[14]','$params[15]','$params[16]','$params[19]');";
##echo "The SQL statement is ",$sql;    
    mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    //echo("There were $how_many rows affected");
    close_connector($db);
    }

?>