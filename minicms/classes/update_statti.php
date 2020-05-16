<?php
class update_statti extends ACore_Admin
{
    protected function obr()
    {
        $img_src = $_FILES['img_src'];
        $fileCount = count($img_src["name"]);

        for ($i = 0;$i < $fileCount;$i++)
        {

            if (!empty($img_src['tmp_name'][$i]))
            {
                if (!move_uploaded_file($img_src['tmp_name'][$i], 'images/' . $img_src['name'][$i]))
                {
                    $error = $img_src['tmp_name'][$i];
                    exit("Не удалось загрузить изображение $error");
                }
            }

        }
        $id = $_POST['id'];
        $title = $_POST['title'];
        $date = date("Y-m-d", time());
        $discription = $_POST['discription'];
        $cat = $_POST['cat'];
        if (empty($title) || empty($discription))
        {
            exit("Не заполнены обязательные поля");
        }
        $link = mysqli_connect($HOST, root, $PASSWORD, minicms);
        $query = "SELECT main_img FROM article WHERE id_article = $id";
        $result1 = mysqli_query($link, $query);
        $row1 = mysqli_fetch_array($result1);
        $img = $row1['main_img'];

        if (isset($_FILES['img_src']))
        {
            $img_src = $_FILES['img_src'];

            $fileCount = count($img_src["name"]);

            $link = mysqli_connect($HOST, root, $PASSWORD, minicms);

            if (empty($img_src['name'][0]))
            {
                $mainImage = $img;
            }
            else
            {
                $mainImage = 'images/' . $img_src['name'][0];
            }

            $query = "UPDATE article SET title_article='$title',description_article='$discription',main_img='$mainImage',date_article='$date',cat='$cat' WHERE id_article='$id'";

            if (!mysqli_query($link, $query))
            {
                exit(mysqli_error($link));

            }
            else
            {
                $_SESSION['res'] = "<center><h2 style='color:red'>Изменения сохранены</h2></center>";
            }

            $query = "SELECT id_pgh, img_pgh FROM paragraph ORDER BY id_article";
            $result2 = mysqli_query($link, $query);
            $row2 = mysqli_fetch_array($result2);
            $id_pgh = $row2['id_pgh'];

            $text = $_POST['text'];
            for ($i = 0;$i < $fileCount;$i++)
            {
                $textValue = $text[$i];

                if (empty($img_src['name'][$i]))
                {
                    $img_value = $row2['img_pgh'];
                    $row2 = mysqli_fetch_array($result2);
                }
                else
                {
                    $img_value = 'images/' . $img_src['name'][$i];
                }
                $query = "UPDATE paragraph SET paragraphs='$textValue',img_pgh='$img_value' WHERE id_article='$id' and id_pgh=($id_pgh+$i)";

                if (!mysqli_query($link, $query))
                {
                    exit(mysqli_error($link));
                }
                else
                {
                    $_SESSION['res'] = "<center><h2 style='color:red'>Изменения сохранены</h2></center>";
                }
            }
        }

    }

    public function get_content()
    {
        if ($_GET['id_text'])
        {
            $id_text = (int)$_GET['id_text'];
        }
        else
        {
            exit('НЕ правильные данные для этой страницы');
        }

        $text = $this->get_text_statti($id_text);
        if ($_SESSION['res'])
        {
            echo $_SESSION['res'];
            unset($_SESSION['res']);
        }

        $cat = $this->get_categories();
?>
                <form enctype="multipart/form-data" action="" method="POST">
                    <div class="pp">
                        <p>Заголовок статьи:<br />
                        <input type='text' name='title' style='width:40%;' value='<? echo "$text[title_article]" ?>'>
                        <input type='hidden' name='id' style='width:40%;' value='<? echo "$text[id_article]" ?>'>
                    </p>
                    <p>Краткое описание:<br />
                        <textarea name='discription' cols='100' rows='7'><?php echo "$text[description_article]"; ?></textarea></p>
                        <?
        $link = mysqli_connect($HOST, root, $PASSWORD, minicms);
        $query = "SELECT paragraphs,img_pgh FROM paragraph WHERE id_article='$id_text'";
        $result = mysqli_query($link, $query);
        if (!$result)
        {
            exit(mysqli_error($link));
        }
        $count = mysqli_num_rows($result);
        $row = array();
        for ($i = 0;$i < $count;$i++)
        {

            $row = mysqli_fetch_array($result);

?>
                        <p>Изображение:<br />
                        <input type="file" name="img_src[]" value="<? echo "$row[img_pgh]" ?>"><br /></p>
                        <textarea class="dd" name="text[<? echo "$i" ?>]" cols='100' rows='7'><?php echo "$row[paragraphs]"; ?></textarea><br />
                        <?
        } ?>

                 <select name="cat">
                        
                 </div>

<?
        foreach ($cat as $item)
        {
            if ($text['cat'] == $item['id_category'])
            {
                echo "<option selected value='" . $item['id_category'] . "'>" . $item['name_category'] . "</option>";
            }
            else
            {
                echo "<option value='" . $item['id_category'] . "'>" . $item['name_category'] . "</option>";
            }
        }
        echo "</select><p><input type='submit' name='button' value='Сохранить'></p></form></center>";
    }
}
?>
