<?php 
    include_once 'db.php';

    function setImgState($state){
        global $conn;
        $conn->select_db("makedb");
        $sql="UPDATE users SET has_img=$state WHERE user_id=".$_SESSION['id'];
        $_SESSION['img']=$state;
        $result=$conn->query($sql);
    }

    function saveImg(){
        $target="../user_img/".$_SESSION['user'].'.png';
        $file=$_FILES["img-file"];
        $type=strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        if(getimagesize($file['tmp_name']) && $file['size']<3000000 && ($type=='jpg' || $type=='png' || $type=='jpeg')){
            if(move_uploaded_file($file["tmp_name"], $target)){
                switch ($type){
                    case 'png':
                        $myFile=imagescale(imagecreatefrompng($target), 200, 200);
                        imagepng($myFile,$target);
                        break;
                    case 'jpg':
                    case 'jpeg':
                        $myFile=imagescale(imagecreatefromjpeg($target), 200, 200);
                        imagejpeg($myFile,$target);
                        break;
                }

                return true;
            }
        }
        return false;
    }

    if(!empty($_POST['img-del'])){
        if($_SESSION['img']=='1'){
            unlink("../user_img/".$_SESSION['user'].'.png');
            setImgState(0);
            echo "<p class='success--output'>Udało się usunąć zdjęcie</p>";
        }
    }else if(!empty($_FILES["img-file"])){
        if(saveImg()){
            setImgState(1);
            echo "<p class='success--output'>Udało się zmienić zdjęcie</p>";
        }else{
            echo "<p class='error--output'>Nie udało się zmienić zdjęcia</p>";
        }
    }
?>