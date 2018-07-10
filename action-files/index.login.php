<?php
	if(isset($_POST['submit'])){

		include 'include/db.inc.php';

		$name = $_POST['u_name'];
		$psw = $_POST['psw'];

		if(empty($psw)){
			header("Location: index.php?empty");
		}else{
			$sql = "SELECT * FROM personal WHERE name='$name'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck < 1){
				header("Location: index.php?error");
			}else{
				if($row = mysqli_fetch_assoc($result)){
					$hashedPswCheck = password_verify($psw, $row['password']);
					if($hashedPswCheck == false){
						header("Location: index.php?error");
					}elseif ($hashedPswCheck == true){
						session_start();
						$_SESSION['loggedin'] = true;
						$_SESSION['s_id'] = $row['id'];
						$_SESSION['s_jmb'] = $row['JMB'];
						$_SESSION['s_name'] = $row['name'];
						$_SESSION['s_last_name'] = $row['last_name'];
						$_SESSION['s_phone_nmb'] = $row['phone_nmb'];
						$_SESSION['s_email'] = $row['email'];
						$_SESSION['s_password'] = $row['password'];
						header("Location: index.type.main.php");
					}
				}
			}
		}

	}else{
		header("Location: index.php?error");
	}