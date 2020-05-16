<?php
require_once ("config.php");
class view extends ACore
{
    public function get_content()
    {
            if (!$_GET['id_text'])
            {
                echo 'Такой статьи не существует';
            }
            else
            {
                $id_text = (int)$_GET['id_text'];
                if (!$id_text)
                {
                    echo 'Такой статьи не существует';
                }
                else
                {
                    $link = mysqli_connect($HOST, root, $PASSWORD, minicms);
                    $query = "SELECT title,text,date,img_src FROM statti WHERE id ='$id_text'";
                    if (!$id_text)
                    {
                        echo 'Такой статьи не существует';
                    }
                    else
                    {
                        $result = mysqli_query($link, $query);
                        if (!$result)
                        {
                            exit(mysqli_error($link));
                        }
                        $row = array();
                        $row = mysqli_fetch_array($result);
                        printf("<div class='mainnews'>
</div>
<h2><p>%s</p></h2>
<div class='mainnews'>
</div>
<p>Дата публикации: %s</p>
<p><img class='imagestat' align='left' src = '%s'>%s</p>
", $row['title'], $row['date'], $row['img_src'], $row['text']);
                    }
                }

            }
        }
    }
?>

