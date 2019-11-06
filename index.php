<?php
    if(isset($_FILES['file']))
    {
        $errors = array();
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $file_ext = strtolower(end(explode('.',$_FILES['file']['name'] )));
        
        if(empty($errors) == true)
        {
            move_uploaded_file($file_tmp,"file/".$file_name);
            echo "Success";
        }
        else
        {
            print $errors;
        }
    }
    function delele()
    {};

    function dwnld($a)
    {
        if (file_exists($a)) {
            if (ob_get_level()) {
                ob_end_clean();
            }
    
            if ($fd = fopen($a, 'rb')) {
                while (!feof($fd)) {
                    print fread($fd, 1024);
                }
                fclose($fd);
            }
            exit;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Documents</title>
    </head>
    <body>
        
        
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit">
        </form>
        
        <div class='row'>
<!--
            <div>
                Sent file: <?php echo $_FILES['file']['name'];?>
            </div>
            <div>
                File size: <?php echo $_FILES['file']['size'];?>
            </div>
            <div>
                File type: <?php echo $_FILES['file']['type'];?>
            </div>
-->
            <ul><div>
                <?php
                
                    $kachka = $_SERVER['DOCUMENET_ROOT'];
                    $agr = scandir('file');
                
                    for($i = 2; $i < count($agr); $i++)
                    {   
                        //chmod("/file/$agr[$i]", 0777);
                        echo 'Name: ' . $agr[$i] . '<br>';   
                        echo 'Size: ' . filesize('file/' . $agr[$i]) . '<br>';
                        echo '<form action=\"\" method=\"post\" enctype="multipart/form-data">';
                        echo '<button type=\"button\" name=\"del\">Delete</button>';
                        echo '<button type=\"button\" name=\"dwn\">Download<?php dwnld($aasasagr[$i])></button>';
                        echo '</form>';
                    }
                ?>
            </div></ul>
        </div>
    </body>
</html>