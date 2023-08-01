<?php
    include 'config.php';
    $statusMsg = '';
    $targetDir = "../assets/images/";

    if (isset($_POST["submit"])){
        uploadImage('card_3_image',$targetDir,$db);
        uploadImage('card_4_image',$targetDir,$db);
        updateContent('hero_heading',$db);
        updateContent('hero_side_content',$db);
        updateContent('hero_button_1_text',$db);
        updateContent('hero_button_2_text',$db);
        updateContent('card_1_heading',$db);
        updateContent('card_1_content',$db);
        updateContent('card_2_heading',$db);
        updateContent('card_2_content',$db);
        updateContent('website_title',$db);
    }else {
        $statusMsg = 'No form data provided';
    }

    function updateContent($key,$db){
        $statusMsg = '';
        if(isset($_POST[$key]) && strlen(trim($_POST[$key]))>0){
            $content = $_POST[$key];
            $query = "UPDATE content SET content_value = '$content' WHERE content_key = '$key'";
                    $insert = $db->query($query);
                    if ($insert) {
                        $statusMsg = "$key has been updated successfully!";
                    } else {
                        $statusMsg = "$key upload failed, please try again.";
                    }
        }
        echo $statusMsg."<br>";
    }

    function uploadImage($key,$targetDir,$db){
        $statusMsg = '';
        if(!empty($_FILES[$key]["name"])) {
            $filename = $_FILES["$key"]["name"];
            $targetFilePath = $targetDir.$filename;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowTypes = array('jpg', 'png', 'jpeg','svg','avif');
            if (in_array($fileType, $allowTypes)) {
                $result = $db->query("SELECT * FROM content WHERE content_key = '$key'");
                if ($result && $row = $result->fetch_assoc()) {
                    $oldFileName = $row['content_value'];
                    $oldFilePath = $targetDir . $oldFileName;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                if (move_uploaded_file($_FILES[$key]["tmp_name"], $targetFilePath)) {
                    // $insert = $db->query("UPDATE images SET content_value = '$card_3_image', WHERE content_key = 'card_3_image'");
                    $query = "UPDATE content SET content_value = '$filename' WHERE content_key = '$key'";
                    $insert = $db->query($query);
                    if ($insert) {
                        $statusMsg = "The file " . $filename . " has been uploaded successfully.";
                    } else {
                        $statusMsg = "File upload failed, please try again.";
                    }
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG and PNG files are allowed to upload.';
            }
        }
        echo $statusMsg;
    }
?>
