<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";



$db = new mysqli($servername, $username, $password, $dbname);


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


$tableName = 'content';
$sqlCheckTable = "SHOW TABLES LIKE '$tableName'";
$result = $db->query($sqlCheckTable);

if ($result->num_rows == 0) {
    $sqlCreateTable = "CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_key` text NOT NULL,
  `content_value` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1, PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

    if ($db->query($sqlCreateTable) === TRUE) {
        echo "Table 'content' created successfully.";
    } else {
        echo "Error creating table: " . $db->error;
    }

    $sqlSeedTable = "INSERT INTO `content` (`id`, `content_key`, `content_value`, `status`) VALUES
(1, 'hero_heading', 'Select the top<br /><span class=\"np-bold text-primary\">eSignature </span>service', 1),
(2, 'hero_side_content', 'From any device, anywhere, you can quickly make <b>electronic signatures</b> and safely sign your digital documents.', 1),
(3, 'hero_button_1_text', 'Start Trial', 1),
(4, 'hero_button_2_text', 'See Pricing', 1),
(5, 'card_1_heading', '<h2 class=\"font-bold text-4xl\">180+</h2> Countries', 1),
(6, 'card_1_content', 'Have used SignSecure to sign agreements', 1),
(7, 'card_2_heading', '<h2 class=\"font-bold text-4xl\">98%</h2> Uptime', 1),
(8, 'card_3_image', 'assets/images/handshake.avif', 1),
(9, 'card_4_image', 'assets/images/meeting.avif', 1),
(10, 'website_title', 'SignSecure', 1),
(11, 'card_2_content', 'for eSignature, with zero maintenence downtime', 1);";

    if ($db->query($sqlSeedTable) === TRUE) {
        echo "Table 'images' created successfully.";
    } else {
        echo "Error creating table: " . $db->error;
    }

}


?>
