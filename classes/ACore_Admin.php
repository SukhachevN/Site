<?php
abstract class ACore_Admin
{

    protected $db;

    public function __construct()
    {

        if (!$_SESSION['user'])
        {
            header("Location:?option=login");
        }


    }

    protected function get_header()
    {
        include "header.php";
    }

    protected function get_rightbar()
    {

        echo '<div id="razdelAdmin"><h1>Раздел администратора</h1>';
        echo '<h2><a href="?option=admin">Статьи</a></h2></div>';

    }

    protected function get_closer()
    {

        include "closer.php";

    }

    public function get_body()
    {
        if ($_POST || $_GET['del'])
        {
            $this->obr();
        }
        $this->get_header();
        $this->get_rightbar();
        $this->get_content();
        $this->get_closer();
    }
    abstract function get_content();

    protected function get_categories()
    {
        $link = mysqli_connect($HOST, root, $PASSWORD, minicms);
        $query = "SELECT id_category,name_category FROM category";
        $result = mysqli_query($link, $query);
        if (!$result)
        {
            exit(mysqli_error($link));
        }
        $row = array();
        for ($i = 0;$i < mysqli_num_rows($result);$i++)
        {
            $row[] = mysqli_fetch_array($result);
        }

        return $row;
    }
    protected function get_text_statti($id)
    {
        $link = mysqli_connect($HOST, root, $PASSWORD, minicms);
        $query = "SELECT id_article,title_article,description_article,main_img,cat FROM article WHERE id_article='$id'";
        $result = mysqli_query($link, $query);
        if (!$result)
        {
            exit(mysqli_error($link));
        }
        $row = array();
        $row = mysqli_fetch_array($result);

        return $row;
    }

}
?>