<?php
abstract class ACore
{

    protected $db;

    public function _construct()
    {
        $this->db = mysql_connect(HOST, USER, PASSWORD);
        if ($this->db)
        {
            exit("ошибка соединения с базой данных" . mysql_error);
        }
        if (!mysql_select_db(DB, $this->db))
        {
            exit("нет такой базы данных" . mysql_error);
        }
        mysql_query("SET NAMES 'UTF8'");
    }

    protected function get_header()
    {
        include "header.php";
    }

    protected function get_rightbar()
    {

       // include "rightbar.php";

    }

    protected function get_menu()
    {

        include "menu.php";

    }

    protected function get_closer()
    {

        include "closer.php";

    }

    public function get_body()
    {
        if ($_POST)
        {
            $this->obr();
        }
        $this->get_header();
        $this->get_menu();
        $this->get_rightbar();
        $this->get_content();
        $this->get_closer();
    }
    abstract function get_content();

}
?>
