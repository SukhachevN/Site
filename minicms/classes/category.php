<?php
require_once ("config.php");
class category extends ACore
{
    private $row = array();
    public function get_content()
    {
        if (!$_GET['id_category'])
        {
            echo 'Такой категории не существует!';
        }
        else
        {
            $id_cat = (int)$_GET['id_category'];
            if (!$id_cat)
            {
                echo 'Такой статьи не существует';
            }
            else
            {
                $link = mysqli_connect($HOST, root, $PASSWORD, minicms);
                $query = "SELECT id_article,title_article,description_article,main_img,date_article FROM article WHERE cat='$id_cat' ORDER BY date_article DESC ";
$query1 = "SELECT id_article,title_article,description_article,main_Img,date_article,cat FROM article ORDER BY date_article DESC";
                $result = mysqli_query($link, $query1);
?>
      <ul class="topmenu">
        <li><a href="" class="submenu-link"><img src="images/buttons/button_gajdy.png" alt="news" style="height: calc(10vw/3); min-height:40px" class="buttons"></a>
          <ul class="submenu">
<?php 
for ($j = 0;$j < mysqli_num_rows($result);$j++)
        {
            $row1 = mysqli_fetch_array($result);
if ($row1['cat']==3){
?>
            <li><a href="?option=view&title=<?php  echo $row1['title_article']; ?>&id_text=<?php  echo $row1['id_article']; ?>">
<?php echo $row1['title_article'] ?> </a></li>
<?php }
} ?>
          </ul>
        </li>
        <li><a href="https://bdotools.xyz/map/"><img src="images/buttons/button_karta.png" alt="guides" style="height: calc(10vw/3); min-height:40px" class="buttons"></a></li>
        <li><a href="https://docs.google.com/spreadsheets/d/1D7mFcXYFm4BUS_MKxTvgBY2lXkGtwWqn2AW91ntUvzE/htmlview?pru=AAABckjbcMg*6U5iNvTkB8Q6ym8mjVHBFw#gid=2097085313"><img src="images/buttons/button_imperka.png" alt="imperka" style="height:calc(10vw/3); min-height:40px" class="buttons"></a></li>
        <li><a href="https://docs.google.com/spreadsheets/d/15BZKdCBjNn2qdqyiu_zDkEmIq5nPNolY8L8Ay7Rgxj8/edit#gid=1086625869"><img src="images/buttons/button_shpargalka.png" alt="shpargalka" style="height: calc(10vw/3); min-height:40px" class="buttons"></a></li>
        <li><a href=""><img src="images/buttons/button_strimery.png" alt="streamers" style="height: calc(10vw/3); min-height:40px" class="buttons"></a></li>
      </ul>
</div>
      </div>
<div class="semilayer">
<?php
                $result = mysqli_query($link, $query);
                if (!$result)
                {
                    exit(mysqli_error($link));
                }
?>
        <section class="mainSection">
        <?
                echo '<h1>База гайдов, предметов и рецептов для Black Desert Online</h1>';
                for ($i = 0;$i < mysqli_num_rows($result);$i++)
                {
                    $row = mysqli_fetch_array($result);
?>
            <div class='mainContent'>
                <?php
                    $img_names = $row['main_Img'];
                    $img_src = $img_names

?>
<?php
                    if (is_file($img_src) && file_exists($img_src))
                    {
?>
  <div class="mainImage"><img loading="lazy" width="400" height="225" src= "<?php echo $img_src; ?>"/></div>
  
  <div class="mainDiscription">
    <a href='?option=view&title=<?php echo $row['title_article']; ?>&id_text=<?php echo $row['id_article']; ?>'>
    <h3><?php echo $row['title_article']; ?></h3>
    <p>
        <?php echo $row['description_article']; ?>
    </p>
    <p class="mainDate">Дата публикации: <?php echo $row['date_article']; ?></p></a>
</div>
    <?php
                    }

                    else
                    {
?>
     <div class="mainDiscriptionImg">
        <a href='?option=view&title=<?php echo $row['title_article']; ?>&id_text=<?php echo $row['id_article']; ?>'>
    <h3><?php echo $row['title_article']; ?></h3>
    <p>
        <?php echo $row['description_article']; ?>
    </p>
    <p class="mainDate">Дата публикации: <?php echo $row['date_article']; ?></p></a>
</div>   <?php
                    }
?> 

</div>
        <?php
                }
?> </section> <?

            }
        }
    }
}
?>