<?php
/**
* Class and Function List:
* Function list:
* - get_content()
* Classes list:
* - view extends ACore
*/
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
                $query = "SELECT id_article,paragraphs,img_pgh FROM paragraph WHERE id_article='$id_text'";
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
<?php

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
                    $count = mysqli_num_rows($result);
                    $title = $_GET['title']
                    ?>

                <div class="semilayer">
                <div class="mainSection">
                <h1><?php echo $title; ?></h1>
                <div class='mainContent2'>
                    <?php 
                    for ($z = 0;$z < $count; $z++) {

                    $row = array();
                    $row = mysqli_fetch_array($result);
                    $img_src = $row['img_pgh'] 
                    ?>
                    <?php
                    if (is_file($img_src) && file_exists($img_src))
                    { ?>

                        <div class="mainContent3">
                        <div class='mainImage'>
                            <p><img class='imagestat' align='left' src= "<?php echo $img_src ?>"/></p></div>
                            
                        <div class="mainDiscription"><?php
                        $textarray = explode("\r\n", $row['paragraphs']);
                        $textCount = count($textarray);

                        for ($i = 0;$i < $textCount;$i++)
                        {
                            $paragraph = $textarray[$i];
                            if (strstr($paragraph, '#'))
                            {
                                $paragraphTitle = str_replace("#", "", $paragraph); ?>
                                 <h2>
                                    <?php echo "$paragraphTitle"; ?>
                                </h2>
                            <?
                            }
                            else
                            {
                            $clickable = preg_replace('*(f|ht)tps?://[A-Za-z0-9\./?=\+&%]+*', '<a href="$0">$0</a>', $paragraph);
?>  
                                <p><?php echo $clickable; ?></p>
                            <?php
                             }
                        } ?>
                        </div> </div>
                    <?php
                    }
                    else
                    { ?>
                        <div class="mainDiscription"><?php
                        $textarray = explode("\r\n", $row['paragraphs']);
                        $fileCount = count($textarray);
                        for ($i = 0;$i < $fileCount;$i++)
                        {
                            $paragraph = $textarray[$i];
                            if (strstr($paragraph, '#'))
                            {
                                $paragraphTitle = substr($paragraph, 0, -1);
?>
                                <h2>
                                    <?php echo "$paragraphTitle"; ?>
                                </h2>
                                <?
                            }
                            else
                            {
?>
                             <p>
                                <?php echo "$paragraph"; ?>
                            </p>

                         <?php
                            }
                         }

?>
                         </div>

                   <?php
                    } }
?> </div> </div> <?php
                }
            }

        }
    }
}
?>
