<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>


    </head>
    <body>

        <form action="" method="post" enctype="multipart/form-data">
            <p> Pictures:
                <input type ="file" name ="pictures[]"/>   
                <input type ="file" name ="pictures[]"/>
                <input type ="file" name ="pictures[]"/>
                <input type ="submit" value="Send"/>                          
            </p>  
        </form>

        <?php
        if (isset($_FILES["pictures"])) {
            foreach (@$_FILES["pictures"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
                    $name = $_FILES["pictures"]["name"][$key];
                    move_uploaded_file($tmp_name, "../_Proyectos/ $name");
                }
            }
        }
        ?>


    </body>
</html>
