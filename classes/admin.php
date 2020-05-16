<?php
class admin extends ACore_Admin
{
    public function get_content()
    {
echo'<div>';
        $link = mysqli_connect($HOST, root, $PASSWORD, minicms);
        $query = "SELECT id_article,title_article FROM article";
        $result = mysqli_query($link, $query);
        if (!$result)
        {
            exit(mysqli_error($link));
        }
echo "<center><h2><a style='color:yellow' href='?option=add_statti'>Добавить статью</a></h2></center>";
if ($_SESSION['res'])
        {
            echo $_SESSION['res'];
            unset($_SESSION['res']);
        }
        $row = array();
        for ($i = 0;$i < mysqli_num_rows($result);$i++)
        {
            $row = mysqli_fetch_array($result); 
            ?>
            <h3 style="text-align: center;">
                <a style='color:white' href='?option=update_statti&id_text=<?php  echo $row['id_article']; ?>'>
                    <?php  echo $row['title_article']?>
                |<a style='color:red' href='?option=delete_statti&del=<?php  echo $row['id_article']; ?>'>удалить</a>
            </h3>
            <?
        }
    }
}
?>