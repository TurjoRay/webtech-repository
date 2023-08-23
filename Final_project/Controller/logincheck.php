<?php
	session_start();
	require_once '../model/model.php';
	
	if(isset($_POST['email'])){
		$email= $_POST['email'];
		$password= $_POST['password'];
		if($email != '' && $password != ''){
          

			//a
		
			//$dtls = file_get_contents('myfile.json');
          //  $dtlsOk=json_decode($dtls);
           

			//$name = $dtlsOk-> name;
			//$userpassword = $dtlsOk-> password;	  
			
			//b

			$trimmedEmail = trim($email);

			$userInfo = getUserInfo($trimmedEmail);
			
		
			if ($userInfo!=null) {

				$userPassword = $userInfo["password"];

				if( $password == $userPassword){
					$_SESSION['flag'] = 'true';
	
					$userid = $userInfo["id"];
					$username = $userInfo["username"];
					$useremail = $userInfo["email"];
					$usergender = $userInfo["gender"];
					$userdob1 = $userInfo["dob1"];
					$userdob2 = $userInfo["dob2"];
					$userdob3 = $userInfo["dob3"];
					$usertravel_lover = $userInfo["travel_lover"];
	
					$user =['id'=> $userid,'username'=> $username, 'password'=> $password, 'email'=> $useremail,'gender'=> $usergender,
							'dob1'=> $userdob1 ,'dob2'=> $userdob2,'dob3'=> $userdob3, 'travel_lover'=> $usertravel_lover];
				
					$_SESSION['user'] = $user;
	
					//header('location: ../view/Dashboard.php');

					echo "1";
									
				}else{				
					echo "Wrong Password";
				}
			}else{
				echo "User not found";
			} 		
		}else{
			echo "email and password is empty";
		   }
	}else{
		echo "invalid request";
	}

?>