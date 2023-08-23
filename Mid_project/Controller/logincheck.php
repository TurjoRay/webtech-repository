<?php
	session_start();
	

	if(isset($_POST['submit'])){
		$username= $_POST['username'];
		$password= $_POST['password'];
		if($username != '' && $password != ''){
          
		
			$dtls = file_get_contents('myfile.json');
            $dtlsOk=json_decode($dtls);
           

			$name = $dtlsOk-> name;
			$userpassword = $dtlsOk-> password;

	

			if($name == $username && $password == $userpassword){
				

				$cookie_name = "username";
                $cookie_value = $username;
				setcookie($cookie_name, $cookie_value, time() +2000, "/");


				$_SESSION['flag'] = 'true';
				header('location: ../view/Dashboard.php');
								
			}else{
				
				echo 'invalid username/password';
			}
		}else{
			echo "null value found";
		   }
	}else{
		echo "invalid request";
	}

?>