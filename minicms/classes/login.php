<?php
require_once ("config.php");
class login extends ACore
{

    protected function obr()
    {
        $link = mysqli_connect($HOST, root, $PASSWORD, minicms);
        $login = strip_tags(mysqli_real_escape_string($link, $_POST['login']));
        $password = strip_tags(mysqli_real_escape_string($link, $_POST['password']));
        if (!empty($login) and !empty($password))
        {
            $password = md5($password);
            $query = "SELECT id FROM users where login='$login' and password='$password'";
            $result = mysqli_query($link, $query);
            if (!$result)
            {
                exit(mysqli_error($link));
            }
            if (mysqli_num_rows($result) == 1)
            {
                $_SESSION['user'] = true;
                header("Location:?option=admin");
                exit();
            }
            else
            {
                exit("такого пользователя нет");
            }
        }
        else
        {
            exit("Заполните обязательные поля");
        }
    }
    public function get_content()
    {
        $link = mysqli_connect($HOST, root, $PASSWORD, minicms);
        $query = "SELECT id,title,discription,date,img_src FROM statti ORDER BY date DESC";
        $result = mysqli_query($link, $query);
        if (!$result)
        {
            exit(mysqli_error($link));
        }
        print <<<HEREDOC
<center><div class='loginmenu'><form enctype='multipart/form-data' action='' method='POST'>
<p>Логин:<br />
<input type='text' name='login'>
</p>

<p>Пароль:<br />
<input type='password' name='password'>
</p>
<p><input type='submit' name='button' value='Войти'></p></form></div></center>
HEREDOC;
        

        
    }

}
?>