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

                
                <div class="mainSection">
                <h1><?php echo $title; ?></h1>
                <div class='mainContent2'>
                    <?php 
                    for ($z = 0;$z < 4; $z++) {

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
?>
                                <p><?php echo "$paragraph"; ?></p>
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
