<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $dayofbirthErr = $monthofbirthErr = $yearofbirthErr = $degreeErr = $bloodgpErr =  "";
$name = $email = $gender = $dayofbirth = $monthofbirth  = $yearofbirth=  $bloodgp = $degree1 = $degree2 = $degree3 = $degree4 = "";





if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Cannot be empty";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace 
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }else if (!preg_match("/^[a-z]+(?:\s[a-z]+)+$/",$name)) {
        $nameErr = "Contains atleast  two words";
    }

  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Cannot be empty";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  

  if (empty($_POST["gender"])) {
    $genderErr = "At least one of them
    must be selected";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  $bloodgp = $_POST["bloodgp"];

  



  if (empty($_POST["dayofbirth"])) {
    $dayofbirthErr = "cannot be empty";
  } else {
    $dayofbirth = test_input($_POST["dayofbirth"]);
  }

  if (empty($_POST["monthofbirth"])) {
    $monthofbirthErr = "cannot be empty";
  } else {
    $monthofbirth = test_input($_POST["monthofbirth"]);
  }

  if (empty($_POST["yearofbirth"])) {
    $yearofbirthErr = "cannot be empty";
  } else {
    $yearofbirth = test_input($_POST["yearofbirth"]);
  }
   
  

  if(isset($_POST["degree"])){
    $degreeArray = $_POST["degree"];

    if($degreeArray != null){
        
          $size = count($degreeArray);
          if($size == "0"){
              $degreeErr = "Cannot be empty";
          }else if($size == "1"){
              $degreeErr = "select at least two ";
          }else if($size == "2"){
              

            $degree1 = test_input ($degreeArray[0]);
            $degree2 = test_input ($degreeArray[1]);
            
           
          }else if($size =="3"){
           
            $degree1 = test_input ($degreeArray[0]);
            $degree2 = test_input ($degreeArray[1]);
            $degree3 = test_input ($degreeArray[2]);

          }else{

            $degree1 = test_input ($degreeArray[0]);
            $degree2 = test_input ($degreeArray[1]);
            $degree3 = test_input ($degreeArray[2]);
            $degree4 = test_input ($degreeArray[3]);
          }

          
    }
  }else{
    $degreeErr = "Cannot be empty";
  }

  
  


}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



<h2>PHP Form Validation </h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  Name: <input type="text" name="name" size="10" value="<?php echo $name;?>"> 
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

  Date of birth: 
  <input type="number" name="dayofbirth" min="1" max="31" value="<?php echo $dayofbirth;?>"> /
  <span class="error">* <?php echo $dayofbirthErr;?></span>
  <input type="number" name="monthofbirth" min="1" max="12" value="<?php echo $monthofbirth;?>">/
  <span class="error">* <?php echo $monthofbirthErr;?></span>
  <input type="number" name="yearofbirth" min="1953" max="1998"   value="<?php echo $yearofbirth;?>">
  <span class="error">* <?php echo $yearofbirthErr;?></span>
  
  <br><br>
 
 
  Blood Group:  <select name="bloodgp" id="bloodgp">
        <option value="A+">A+</option>
        <option value="B+">B+</option>
        <option value="AB+">AB+</option>
        <option value="O+">O+</option>
        <option value="A-">A-</option>
        <option value="B-">B-</option>
        <option value="AB-">AB-</option>
        <option value="O-">O-</option>
    </select>
    <br><br>

   Degree:
  <input type="checkbox" id="SSC" name="degree[]" value="SSC">
  <label for="degree"> SSC </label>
  <input type="checkbox" id="HSC" name="degree[]" value="HSC">
  <label for="degree"> HSC </label>
  <input type="checkbox" id="Bsc" name="degree[]" value="Bsc">
  <label for="degree">Bsc</label>
  <input type="checkbox" id="Msc" name="degree[]" value="Msc">
  <label for="degree">Msc</label>
  <span class="error">* <?php echo $degreeErr;?></span>
  <br><br>
  
 
  
    Gender: <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dayofbirth;
echo "<br>";
echo $monthofbirth;
echo "<br>";
echo $yearofbirth;
echo "<br>";
echo $bloodgp;
echo "<br>";
echo $degree1;
echo "<br>";
echo $degree2;
echo "<br>";
echo $degree3;
echo "<br>";
echo $degree4;
echo "<br>";
echo $gender;
echo "<br>";

?>

</body>
</html>