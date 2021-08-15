<?php
if(isset($_POST['register'])) {
	$_POST['email'] = trim($_POST['email']);
	$_POST['username'] = trim($_POST['username']);
	$_POST['password'] = trim($_POST['password']);

	if(empty($_POST)) {
		$a = true;
		$error = 'Пожалуйста, заполните форму...';
	}
	else if(empty($_POST['email'])) {
		$a = true;
		$error = 'Пожалуйста, впишите свой адрес электронной почты (E-mail) в соответствующую строку!';
	}
	else if(empty($_POST['username'])) {
		$a = true;
		$error = 'Пожалуйста, придумайте логин и впишите в соответствующую строку!';
	}
	else if(empty($_POST['password'])) {
		$a = true;
		$error = 'Пожалуйста, придумайте и впишите пароль в соответствующую строку!';
	}
	else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$a = true;
		$error = 'Вы некорректно ввели E-mail! Пожалуйста, перепроверьте введеный E-mail на соответствие формату everyone@everywhere.domen.';
	}

	else {
  		$users = "users/users.txt";
  		$resourses = "users/res.txt";

  		$arr = file($users);
  		foreach($arr as $line) {
  			$data = explode("::", $line);
  			$temp[] = $data[0];
  		}
  		if(in_array($_POST['username'], $temp)) {
    		$a = true;
    		$error = 'Данный логин уже зарегистрирован. Пожалуйста, выберите другой...';
  		}

  		else {
  			foreach($arr as $line) {
  				$data = explode("::", $line);
  				$temp[] = $data[1];
  			}	

  			if(in_array($_POST['email'], $temp)) {
  				$a = true;
  				$error = 'Данная электронная почта (E-mail) уже зарегистрирована. Пожалуйста, выберите другую...';
  			}
  			else {

		  		$f_users = fopen($users, "a");
		  		$f_resourses = fopen($resourses, "a");
				if(!$f_users) {
					$a = true;
					$error = 'Ошибка при открытии файла данных';
				}
				else if(!$f_resourses) {
					$a = true;
					$error = 'Ошибка при открытии файла данных';
				}

				else {
					$money = 0;

					$veg = 0;
					$fru = 0;
					$ber = 0;
					$villager = 0;

					$hash_pas = password_hash($_POST['password'], PASSWORD_BCRYPT);

					$str_users = 
						$_POST['username']."::".
						$_POST['email']."::".
					    $hash_pas."::\r\n";
					fwrite($f_users, $str_users);
					fclose($f_users);

					$str_fields =
						$_POST['username']."::".
						$veg."::".
						$fru."::".
						$ber."::".
						$villager."::\r\n";
					fwrite($f_fields, $str_fields);
					fclose($f_fields);

					$str_castle =
						$_POST['username']."::".
						$money."::\r\n";
					fwrite($f_castle, $str_castle);
					fclose($f_castle);

					echo "<HTML><HEAD><META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'></HEAD></HTML>";
				}
			}
		}
	}
}
?>