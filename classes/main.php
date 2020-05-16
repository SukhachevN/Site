<?php
require_once ("config.php");
class main extends ACore
{
    public function get_content()
    {
        $link = mysqli_connect($HOST, root, $PASSWORD, minicms);
        $query = "SELECT id,title,discription,date,img_src FROM statti ORDER BY date DESC";

        $result = mysqli_query($link, $query);
        if (!$result)
        {
            exit(mysqli_error($link));
        }

        echo '<h1>База гайдов, предметов и рецептов для Black Desert Online</h1>';
        $row = array();
        for ($i = 0;$i < mysqli_num_rows($result);$i++)
        {
            $row = mysqli_fetch_array($result);
            printf("<div class='mainnews'>
</div>
<h2><p>%s</p></h2>
<div class='mainnews'>
</div>
<p>Дата публикации: %s</p>
<p><img class='image' align='left' src = '%s'>%s</p>
<p style='color:red'><a href='?option=view&id_text=%s'><img  src='images/buttons/button_chitat.png' class='buttonread'></a></p>
", $row['title'], $row['date'], $row['img_src'], $row['discription'], $row['id']);
        }

    }

}
?>