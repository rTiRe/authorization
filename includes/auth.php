<?php
	$users = 'users/users.txt';
	define("FIRST", index);

	if(isset($_POST['login'])) {
		$arr = file($users);
    	$i = 0;
    	$temp = array();

    	foreach($arr as $line) {
    		$data = explode("::", $line);
    		$temp['login'][$i] = $data[0];
      		$temp['password'][$i] = $data[2];
      		$i++;
      	}
      	if(!in_array($_POST['login-username'], $temp['login'])) {
      		$b = true;
      		$error = 'Пользователь с таким именем не зарегистрирован!';
    	}
    	else {
	    	$index = array_search($_POST['login-username'],$temp['login']);
	    	if(password_verify($_POST['login-password'], $temp['password'][$index]) != $temp['password'][$index]) {
	      		$b = true;
	      		$error = 'Введен неверный пароль!';
	    	}
	    	else {
	    		$_SESSION['login'] = $_POST['login-username'];
	    		$_SESSION['password'] = $_POST['login-password'];
	    		echo("<script>location.href='/pages/fields/fields.php'</script>");
	    	}
    	}
	}
?>