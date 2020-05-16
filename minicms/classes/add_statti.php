<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>formulaire multichamp</title>
<script type="text/javascript">
function create_champ(i) {
var i2 = i + 1;

document.getElementById('leschamps_'+i).innerHTML = '<div><p>Изображение:<br /><input type="file" name="img_src[]"></p><br /><textarea class="dd" name="text['+i+']"></textarea><br /></div></span>';
document.getElementById('leschamps_'+i).innerHTML += (i <= 10) ? '<br /><span id="leschamps_'+i2+'"><a href="javascript:create_champ('+i2+')">Ajouter un champs</a></span>' : '';
}
</script>
</head>
<body>
    <?php
class add_statti extends ACore_Admin
{

    protected function obr()
    {
        $img_src = $_FILES['img_src'];
        $fileCount = count($img_src["name"]);

        for ($i = 0; $i < $fileCount; $i++) {

            if (!empty($img_src['tmp_name'][$i]))
        {
            if (!move_uploaded_file($img_src['tmp_name'][$i], 'images/' . $img_src['name'][$i]))
            {
                $error = $img_src['tmp_name'][$i];
                exit("Не удалось загрузить изображение $error");
            }
        }

    }
        $title = $_POST['title'];
        $date = date("Y-m-d", time());
        $discription = $_POST['discription'];
        $cat = $_POST['cat'];
        if (empty($title) || empty($discription))
        {
            exit("Не заполнены обязательные поля");
        }


        if (isset($_FILES['img_src'])) {
            $img_src = $_FILES['img_src'];
            $mainImage = 'images/' . $img_src['name'][0];
            $fileCount = count($img_src["name"]);

            $link = mysqli_connect($HOST, root, $PASSWORD, minicms);
            $query = "INSERT INTO article (title_article,description_article,main_img,date_article,cat) VALUES ('$title','$discription','$mainImage','$date','$cat')";
            if (!mysqli_query($link, $query)) {
                exit(mysqli_error($link));
            }
            else {
                $_SESSION['res'] = "<center><h2 style='color:red'>Изменения сохранены</h2></center>";
            }

            $query = "SELECT id_article FROM article ORDER BY id_article DESC";
            $result2 = mysqli_query($link, $query);
            $row2 = mysqli_fetch_array($result2);
            $id_article = $row2['id_article'];

            $text = $_POST['text'];
            for ($i = 0; $i < $fileCount; $i++) {
                $textValue = $text[$i];
                $img_value = 'images/' . $img_src['name'][$i];
                $query = "INSERT INTO paragraph (id_article,paragraphs,img_pgh) VALUES ('$id_article','$textValue','$img_value')";


                if (!mysqli_query($link, $query)) {
                    exit(mysqli_error($link));
                }
                else {
                $_SESSION['res'] = "<center><h2 style='color:red'>Изменения сохранены</h2></center>";
            }
        }
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

                ?>
                <form enctype="multipart/form-data" action="" method="POST">
                    <div class="pp">
                        <p>Заголовок статьи:<br />
                        <input type='text' name='title' style='width:40%;'></p>

                        <p>Краткое описание:<br />
                            <textarea name='discription' cols='100' rows='7'></textarea></p>
                        
                        <p>Изображение:<br />
                        <input type="file" name="img_src[]"><br /></p>
                        <textarea class="dd" name="text[0]" cols='100' rows='7'></textarea><br />

                         <span id="leschamps_1"><a href="javascript:create_champ(1)"><h2>NEW PARAGRAPH</h2><br /></a></span>

                 <select name="cat">
                        
                 </div>

                 
                 <?php

        foreach ($cat as $item)
        {
            echo "<option value='" . $item['id_category'] . "'>" . $item['name_category'] . "</option>";
        }
        echo "</select><p><input type='submit' name='button' value='Сохранить'></p></form></center>";
    }
}
?>

</body>
</html>