<?php
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat)
{
	$result;
	if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) 
		{
			$result = true;
		}
		else { $result=false; }
	return $result;
	
}

function invalidUid($username)
{
	$result;
	if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) 
		{
			$result = true;
		}
		else { $result=false; }
	return $result;
	
}
function invalidEmail($email)
{
	$result;
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$result = true;
		}
		else { $result=false; }
	return $result;
	
}
function pwdMatch($pwd, $pwdRepeat)
{
	$result;
	if($pwd !== $pwdRepeat) 
		{
			$result = true;
		}
		else { $result=false; }
	return $result;
	
}
function uidExists($conn, $username, $email)
{
	$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql))
	{
	header("location: signup.php?error=stmtfailed");
		exit();	
	}
	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if($row = mysqli_fetch_assoc($resultData))
	{
		return $row;		
	}
	else
	{
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}
function createUser($conn, $name, $email, $username, $pwd)
{
	$sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql))
	{
	header("location: signup.php?error=stmtfailed");
		exit();	
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);	

	mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: signup.php?error=none");
		exit();	
}
function emptyInsert($denumire, $categorie)
{
	$result;
	if(empty($denumire) || empty($categorie)) 
		{
			$result = true;
		}
		else { $result=false; }
	return $result;
	
}
function emptyInputLogin($username, $pwd)
{
	$result;
	if(empty($username) || empty($pwd)) 
		{
			$result = true;
		}
		else { $result=false; }
	return $result;
	
}

function emptyDelete($denumire)
{
	$result;
	if(empty($denumire)) 
		{
			$result = true;
		}
		else { $result=false; }
	return $result;
	
}

function emptyInputContact($name, $mail, $subject, $message)
{
	$result;
	if(empty($name) || empty($mail) || empty($subject) || empty($message)) 
		{
			$result = true;
		}
		else { $result=false; }
	return $result;
	
}
function loginUser($conn, $username, $pwd)
{
	$uidExists = uidExists($conn, $username, $username);
if ($uidExists === false)
{
header("location: login.php?error=wronglogin");
exit();
}
$pwdHashed = $uidExists["usersPwd"];
$checkPwd = password_verify($pwd,$pwdHashed);
if($checkPwd === false)
{
header("location: login.php?error=wronglogin");
exit();
}
else if ($checkPwd === true)
{
	session_start();
	$_SESSION["userid"] = $uidExists["usersId"];
	$_SESSION["useruid"] = $uidExists["usersUid"];
	$_SESSION["val_user"] = $getuser["tip_user"];

header("location: index.php");
exit();
}
}	

function getuser($conn, $admin)
{
	$sql = "SELECT * FROM users WHERE tip_user = ? ;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql))
	{
	header("location: signup.php?error=stmtfailed");
		exit();	
	}
	mysqli_stmt_bind_param($stmt, "i", $admin);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if($row = mysqli_fetch_assoc($resultData))
	{
		return $row;		
	}
	else
	{
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

function insertFilm($conn, $denumire, $categorie, $descriere)
{
	$sql = "INSERT INTO film (denumire, categorie, descriere) VALUES (?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql))
	{
	header("location: signup.php?error=stmtfailed");
		exit();	
	}
	mysqli_stmt_bind_param($stmt, "sss", $denumire, $categorie, $descriere);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: gestionarebd.php?error=none");
		exit();	
}

function deleteFilm($conn, $denumire)
{
	$sql = "DELETE FROM film where denumire = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql))
	{
	header("location: signup.php?error=stmtfailed");
		exit();	
	}
	mysqli_stmt_bind_param($stmt, "s", $denumire);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: gestionarebd.php?error=none");
		exit();	
}

function deleteUser($conn, $username)
{
	$sql = "DELETE FROM users where (usersUid = ? AND tip_user=0);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql))
	{
	header("location: signup.php?error=stmtfailed");
		exit();	
	}
	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: gestionarebd.php?error=none");
		exit();	
}

function getAdmin($conn)
{
    session_start();
    if(isset($_SESSION["useruid"])){

           $query = "SELECT tip_user FROM users WHERE usersUid= '".$_SESSION['useruid']."'";

           $result = mysqli_query($conn, $query) or 

           die(mysql_error($conn)); 

           if (!$result) die('Query failed: ' . mysqli_error($conn)); 

           while($row = mysqli_fetch_array($result)){ 

           $rez= $row['tip_user'];

        }
        return $rez;
    }

}





