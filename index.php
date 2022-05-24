<?php
header('Content-Type: text/html; charset=UTF-8');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {  
    $messages = array();
	if (!empty($_COOKIE['save'])) {
      setcookie('save', '', 100000);
    	$messages[] = 'Данные сохранены';
  	}
    $errors = array();
    $errors['name'] = !empty($_COOKIE['name_error']);
    $errors['email'] = !empty($_COOKIE['email_error']);
    $errors['dataB'] = !empty($_COOKIE['dataB_error']);
    $errors['gender'] = !empty($_COOKIE['gender_error']);
    $errors['limbs'] = !empty($_COOKIE['limbs_error']);
    $errors['superpowers'] = !empty($_COOKIE['superpowers_error']);
    $errors['biography'] = !empty($_COOKIE['biography_error']);
    $errors['limit_name'] = !empty($_COOKIE['name_limit']);
    $errors['limit_mail'] = !empty($_COOKIE['mail_limit']);

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $requestError = false;
        if (!empty($_POST)) {
            if (empty($_POST["name"])) {
                $errors['name'] = "Ваше имя, пожалуйста!(´꒳`)";
            } elseif (!preg_match("/^\s*[a-zA-Zа-яА-Я'][a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?\s*$/u", $_POST["name"])) {
                $errors['name'] = "Нет такого имени!(≖､≖╬)";
            }
    
            if (empty($_POST["email"])) {
                $errors['email'] = "Ваш e-mail!(´꒳`)";
            } elseif (!preg_match("/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/", $_POST["email"])) {
                $errors['email'] = "Нет такого e-mail!(≖､≖╬)";
            }
    
            if (empty($_POST["year"])) {
                $errors['year'] = "Ваш год рождения!(´꒳`)";
            } elseif (!preg_match("/^\s*[1]{1}9{1}\d{1}\d{1}.*$|^\s*200[0-8]{1}.*$/", $_POST["year"])) {
                $requestError = true;
            }
    
            if (!isset($_POST["gender"])) {
                $errors['gender'] = "Ваш пол!(´꒳`)";
            } elseif (intval($_POST["gender"]) < 1 && 2 < intval($_POST["gender"])) {
                $requestError = true;
            }
    
            if (!isset($_POST["numlimbs"])) {
                $errors['numlimbs'] = "Кол-во ваших конечностей!(´꒳`)";
            } elseif (intval($_POST["numlimbs"]) < 1 || 4 < intval($_POST["numlimbs"])) {
                $requestError = true;
            }
    
            if (!isset($_POST["super-powers"])) {
                $errors['super-powers'] = "Ваша суперспособность!(´꒳`)";
            } else {
                foreach ($_POST["super-powers"] as $value) {
                    if (intval($value) < 1 || 3 < intval($value)) {
                        $requestError = true;
                        break;
                    }
                }
            }
    
            if (empty($_POST["biography"])) {
                $errors['biography'] = "Расскажите о себе!(´꒳`)";
            }
        } else {
            $requestError = true;
        }

    $values = array();

    $values['name'] = empty($_COOKIE['name_value']) ? '' : $_COOKIE['name_value'];
    $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
    $values['dataB'] = empty($_COOKIE['dataB_value']) ? '' : $_COOKIE['dataB_value'];
    $values['gender'] = empty($_COOKIE['gender_value']) ? '' : $_COOKIE['gender_value'];
    $values['limbs'] = empty($_COOKIE['limbs_value']) ? '' : $_COOKIE['limbs_value'];
    $values['superpowers'] = empty($_COOKIE['superpowers_value']) ? '' : $_COOKIE['superpowers_value'];
    $values['biography'] = empty($_COOKIE['biography_value']) ? '' : $_COOKIE['biography_value'];

  include('form.php');
}
else{
    $errors = FALSE;

    if (!preg_match("/^[а-я А-Я0-9]+$/u",$_POST['name'])or(empty($_POST['name']))){
        setcookie('name_limit', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    }
    else{
        setcookie('name_value', $_POST['name'], time() + 365 * 24 * 60 * 60);
    }
    if (!preg_match("/^[0-9a-z_-]+@[0-9-a-z_^\.]+\.[0-9a-z_-]{15,50}$/i",$_POST['email'])or(empty($_POST['email']))){
        setcookie('mail_limit', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    }
    else{
        setcookie('email_value', $_POST['email'], time() + 365 * 24 * 60 * 60);
    }
    if (empty($_POST['dataB'])) {
        setcookie('dataB_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    }
    else{
        setcookie('dataB_value', $_POST['dataB'], time() + 365 * 24 * 60 * 60);
    }
    if (empty($_POST['gender'])) {
        setcookie('gender_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    }
    else{
        setcookie('gender_value', $_POST['gender'], time() + 365 * 24 * 60 * 60);
    }
    if (empty($_POST['limbs'])) {
        setcookie('limbs_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    }
    else{
        setcookie('limbs_value', $_POST['limbs'], time() + 365 * 24 * 60 * 60);
    }
    if (empty($_POST['superpowers'])) {
        setcookie('superpowers_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    }
    else{
        setcookie('superpowers_value', $_POST['superpowers'], time() + 365 * 24 * 60 * 60);
    }
    if ($errors) {
        header('Location: index.php');
        exit();
    }
    else {
        setcookie('name_error', '', 100000);
        setcookie('name_limit', '', 100000);
        setcookie('email_error', '', 100000);
        setcookie('mail_limit', '', 100000);
        setcookie('date_error', '', 100000);
        setcookie('gender_error', '', 100000);
        setcookie('limbs_error', '', 100000);
        setcookie('superpowers_error', '', 100000);
        setcookie('biography_error', '', 100000);
      }


 

$name = $_POST['name'];
$email = $_POST['email'];
$dataB = $_POST['dataB'];
$gender = $_POST['gender'];
$limbs = $_POST['limbs'];
$superpowers = implode(',',$_POST['superpowers']);
$biography = $_POST['biography'];


$user = 'u47538';
$pass = '7904823';
$db = new PDO('mysql:host=localhost;dbname=u47538', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

try {
  $stmt = $db->prepare("INSERT INTO form (name,email,date,gender,limbs,biography)".
  " VALUES(:name,:email,:dataB,:gender,:limbs,:biography)");

  $stmt -> execute(array('name'=>$name,'email'=>$email,'dataB'=>$dataB,'gender'=>$gender,
  'limbs'=>$limbs,'biography'=>$biography));

  $stmt = $db->prepare("INSERT INTO superpower (superpowers)"." VALUES(:superpowers)");
  $stmt -> execute(array('superpowers'=>$superpowers));
  print ('Благодарим за заполнение формы, ваши результаты сохранены.<br/>');
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}
setcookie('save', '1');
header('Location: index.php');
}
?>