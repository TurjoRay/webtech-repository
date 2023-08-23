<?php
	session_start();
	if(isset($_SESSION['flag'])){
?>

<!DOCTYPE html>
<html>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />

<head>
        <style>
        .deleteButton {
            background-color: #FF0000;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
           
            cursor: pointer;
        }

        .updateButton {
            background-color: #4CAF50;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
           
            cursor: pointer;
        }



        </style>
    <title>Edit</title>
</head>

<body style="background-color:powderblue;">
<form method="post" action="../controller/update_profile.php">

<input name="id" type="hidden" value="<?=$_SESSION['user']['id']?>">
<input name="gender" type="hidden" value="<?=$_SESSION['user']['gender']?>">
<input name="travel_lover" type="hidden" value="<?=$_SESSION['user']['travel_lover']?>">


    <center>
        <table border="1" width="1000px">

            <tr>
                <td colspan="2">
                    <table width="1200px">
                        <tr>
                            <td align="Left">
                                <h1 style="color:red;"><p>Adventure Life Tours Adventure Life Tours &#128512;</p></h1>
                            </td>
                            <td align="Right">
                            Logged in as
                                <a href="View_Profile.php"><?=$_SESSION['user']['username']?></a> |
                                <a href="Login.php">Logout</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td height="150px" width="200px">
                    Account<br><hr>
                    <ul>
                    <li><a href="Dashboard.php">Dashboard</a></li>
                        <li><a href="View_profile.php">View Profile</a></li>
                        <li><a href="Edit_Profile.php">Edit Profile</a></li>
                        <li><a href="Change_Profile_Picture.php">Change Profile Picture</a></li>
                        <li><a href="Change_Password.php">Change Password</a></li>
                        <li><a href="Tour_Packages.php.Php">Tour Packages</a></li>
                        <li><a href="Login.php">Logout</a></li>
                    </ul>
                </td>
                <td>
                <fieldset>
			<legend>EDIT PROFILE</legend>
			<table width="500px">
				<tr>
					<td>Name</td>
                    <td>:<input type="text" name="username" value="<?=$_SESSION['user']['username']?>"></td>
				</tr>
                <tr>
                   <td colspan="2"><hr></td> 
                </tr>
                
				<tr>
					<td>Email</td>
                    <td>:<input type="email" name="email"  value="<?=$_SESSION['user']['email']?>"></td>
				</tr>
                <tr>
                   <td colspan="2"><hr></td> 
                </tr>

                <tr>
					<td>Password</td>
                    <td>:<input type="password" name="password" value="<?=$_SESSION['user']['password']?>"></td>
				</tr>
               

                <tr>
                <td>Date of Birth</td>
                <td>:<input type="number" name="dob1" value="<?=$_SESSION['user']['dob1']?>" min="1" max="31"> <b> / </b>
                    <input type="number" name="dob2" value="<?=$_SESSION['user']['dob2']?>" min="1" max="12"> <b> / </b>
                    <input type="number" name="dob3" value="<?=$_SESSION['user']['dob3']?>" min="1500" max="3500"> (dd/mm/yyy)
				</td>
                </tr>
                
                <tr>
                   <td colspan="3"><hr></td> 
                </tr>

                <tr>
                <td><input type="submit" name="update_profile" class="updateButton" value="Update"></td>
				</tr>	
               
              <td><input type="submit" name="deleteuser" value= "Delete" class="deleteButton">  </td>
              
            
			</table>
            </fieldset>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <center>
                   Explore The World
                    </center>
                </td>
            </tr>
        </table>
    </center>
    </form>
</body>

</html>

<?php
	
	}else{
		header('location: login.php');
	}
?>