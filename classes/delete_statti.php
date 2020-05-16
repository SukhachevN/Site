<?php
class delete_statti extends ACore_Admin
{
    public function obr()
    {
        if ($_GET['del'])
        {
            $id_text = (int)$_GET['del'];
            $link = mysqli_connect($HOST, root, $PASSWORD, minicms);
            $query = "DELETE FROM statti WHERE id='$id_text'";
            if (mysqli_query($link, $query))
            {
                $_SESSION['res'] = "<center><h2 style='color:red'>Статья удалена</h2></center>";
                header("Location:?option=admin");
                exit();
            }
            else
            {
                exit(mysqli_error($link));
            }
        }
        else
        {
            exit("Неверные данные");
        }
    }
        public function get_content() {
		
	}
}
?>