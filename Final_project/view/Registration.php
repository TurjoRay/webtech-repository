<!DOCTYPE html>
<html>
<head p {
  font-family: monospace;
  font-size: 3em;
  animation: color-change 1s infinite;
}

@keyframes color-change {
  0% { color: red; }
  50% { color: blue; }
  100% { color: red; }
} >

<style>
        .submitButton {
            background-color: #4CAF50;
            border: none;
            color: black;
            text-align: center;
            text-decoration: none;
            display: inline-block;          
            cursor: pointer;
        }

        .resetButton {
            background-color: #FFFF00;
            border: none;
            color: black;
            text-align: center;
            text-decoration: none;
            display: inline-block;         
            cursor: pointer;
        }



        </style>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
  <title>Registration Page</title>
</head>
<body   style="background-color:powderblue;">

	<form method="post" action="../controller/RegistrationCheck.php"  name="form" id="formId"  >

			
    <table border="1" width="1000px">
	    <tr>
            <td>
                <table width="1200px">
                    <tr>
						<td align="Left">
                <h1 style="color:red;"><p>Adventure Life Tours &#128512;</p>  </h1>
            </td>
           <td align="Right">
                <a href="../index.php">Home</a> 
                <a href="Login.php">Login</a> 
                <a href="Registration.php">Registration</a>
            </td>
                    </tr>
                    </table>
            </td>
        </tr>    
        <tr>
            <td colspan="2">
			<fieldset>
			<legend>REGISTRATION</legend>
			<table>
				<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
				</tr>
				<tr>
                   <td colspan="2"><hr></td> 
                </tr>
				<tr>
                <div class="form-control">
					<td>Email</td>
					<td><input type="3" id = "emailId" name="email" onfocusout="checkEmail(this.value)"></td>
                    <td><small id="emailErrorId"></small></td>
               </div>
				</tr>
				<tr>
                   <td colspan="2"><hr></td> 
                </tr>
				<tr>
                    <div class="form-control">
					<td>Password</td>
					<td><input type="3" id = "passwordId" name="password"></td>
                    <td><small id="passwordErrorId"></small></td>
                   
                </div>
				</tr>
				<tr>
                   <td colspan="2"><hr></td> 
                </tr>
				<tr>
                    <div class="form-control">
					<td>Confirm Password</td>
					<td><input type="3" id = "confirmPasswordId" name="Confirm password"  onkeyup="showHint(this.value)"></td>
                    <td><small id="confirmPasswordErrorId"></small></td> 
                </div>
				</tr>
				<tr>
                   <td colspan="2"><hr></td> 
                </tr>
				<tr>
                <tr>
                    <td colspan="2">
					<fieldset>
					<legend>Gender</legend>
                           <input type="radio" name="gender" value="Male"> Male
                        <input type="radio" name="gender" value="Female"> Female
                        <input type="radio" name="gender" value="Other"> Other
                    </fieldset>
					<hr>
					</td>
                </tr>
				<tr>
                    <td colspan="2">
					<fieldset>
					<legend>Date of Birth</legend>
                    <input type="number"   name="dob1" value="" min="1" max="31"> <b> / </b>
                    <input type="number" name="dob2" value="" min="1" max="12"> <b> / </b>
                    <input type="number" name="dob3" value="" min="1800" max="2050"> (dd/mm/yyy)
                    </fieldset>
					<hr>
					</td>
                </tr>

                <tr>
                    <td colspan="2">
					
					<legend>Are You a Travel Lover?</legend>
                           <input type="radio" name="travel_lover" value="Yes"> Yes
                        <input type="radio" name="travel_lover" value="No"> No
					<hr>
					</td>

				<tr>
					<td><input type="submit" name="submit" class="submitButton" value="Submit"> <input type="reset" class ="resetButton" name="reset" value="Reset"></td>
				</tr>
			</table>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <center style="color:red;">
               Explore The World
                </center>
            </td>
        </tr>
    </table> </center>
		
	</form>

    <script>
            function showHint(data) {
                const password = document.getElementById('passwordId');
                const passwordValue = password.value.trim()

        

                const confirmPassword = document.getElementById('confirmPasswordId');
                const confirmPasswordError = document.getElementById('confirmPasswordErrorId');

                

                if(passwordValue === data){
                    const formControl = confirmPassword.parentElement;
                    formControl.className = 'form-control success';
                    confirmPasswordError.innerText = "";
                    
                }else{
                    const formControl = confirmPassword.parentElement;
                    formControl.className = 'form-control error';
                    confirmPasswordError.innerText = "Does not match";
                }
            }


            function checkEmail(data) {

                const email = document.getElementById('emailId');
                const emailEorrorId = document.getElementById('emailErrorId');
        
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if (re.test(data.trim())) {

                    $.ajax({    
                        type: "post",
                        url: "/final/Controller/Registrationcheck.php",  
                        data:  {email: data},           
                        dataType: "json",                  
                        success: function(data){
                            if($.trim(data) === "1"){
                                const formControl = email.parentElement;
                                formControl.className = 'form-control success';
                                emailErrorId.innerText = "";
                                  
                            }else{
                               
                                const formControl = email.parentElement;
                                formControl.className = 'form-control error';
                                emailErrorId.innerText = "Email exist";
                               
                            }
                        },
                        error: function(data){
                           

                            if($.trim(data) === "1"){
                               
                                const formControl = email.parentElement;
                                formControl.className = 'form-control success';
                                emailErrorId.innerText = "";
                              
                            }else{
                               
                                const formControl = email.parentElement;
                                formControl.className = 'form-control error';
                                emailErrorId.innerText = "Email exist ";
                                        
                            }
                        }
                    });
                    

                }else{
                    //email validation
                }
            }


            
    </script>

   
</body>
</html>