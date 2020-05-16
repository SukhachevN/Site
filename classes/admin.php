<?php
class admin extends ACore_Admin
{
    public function get_content()
    {
echo'<div class="semilayer">';
        $link = mysqli_connect($HOST, root, $PASSWORD, minicms);
        $query = "SELECT id,title FROM statti";
        $result = mysqli_query($link, $query);
        if (!$result)
        {
            exit(mysqli_error($link));
        }
echo "<h2><a style='color:yellow' href='?option=add_statti'>Добавить статью</a></h2>";
if ($_SESSION['res'])
        {
            echo $_SESSION['res'];
            unset($_SESSION['res']);
        }
        $row = array();
        for ($i = 0;$i < mysqli_num_rows($result);$i++)
        {
            $row = mysqli_fetch_array($result);
            printf("<center>
<p><h3><a style='color:white' href='?option=update_statti&id_text=%s'>%s</a>
|<a style='color:red' href='?option=delete_statti&del=%s'>удалить</a></h3></p>
</center>
",$row['id'], $row['title'],$row['id']);
        }
    }
}
?>