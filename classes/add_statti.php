<?php
class add_statti extends ACore_Admin
{

    protected function obr()
    {
        if (!empty($_FILES['img_src']['tmp_name']))
        {
            if (!move_uploaded_file($_FILES['img_src']['tmp_name'], 'images/' . $_FILES['img_src']['name']))
            {
                exit("Не удалось загрузить изображение");
            }
            $img_src = 'images/' . $_FILES['img_src']['name'];
        }
        else
        {
            exit("Необходимо загрузить изображение");
        }
        $title = $_POST['title'];
        $date = date("Y-m-d", time());
        $discription = $_POST['discription'];
        $text = $_POST['text'];
        $cat = $_POST['cat'];
        if (empty($title) || empty($text) || empty($discription))
        {
            exit("Не заполнены обязательные поля");
        }
        $link = mysqli_connect($HOST, root, $PASSWORD, minicms);
        $query = "INSERT INTO statti (title,discription,text,date,img_src,cat) VALUES ('$title','$discription','$text','$date','$img_src','$cat')";
        if (!mysqli_query($link, $query))
        {
            exit(mysqli_error($link));
        }
        else
        {
            $_SESSION['res'] = "<center><h2 style='color:red'>Изменения сохранены</h2></center>";
            header("Location:?option=add_statti");
            exit;
        }
    }

    public function get_content()
    {
        if ($_SESSION['res'])
        {
            echo $_SESSION['res'];
            unset($_SESSION['res']);
        }

        $cat = $this->get_categories();

        print <<<HEREDOC
<center><form enctype='multipart/form-data' action='' method='POST'>
<p>Заголовок статьи:<br />
<input type='text' name='title' style='width:40%;'>
</p>
<p>Изображение:<br />
<input type='file' name='img_src'>
</p>
<p>Краткое описание:<br />
<textarea name='discription' cols='100' rows='7'></textarea>
</p>
<p>Текст:<br />
<textarea name='text' cols='100' rows='7'></textarea>
</p>
<select name='cat'>
HEREDOC;
        foreach ($cat as $item)
        {
            echo "<option value='" . $item['id_category'] . "'>" . $item['name_category'] . "</option>";
        }
        echo "</select><p><input type='submit' name='button' value='Сохранить'></p></form></center>";
    }
}
?>
