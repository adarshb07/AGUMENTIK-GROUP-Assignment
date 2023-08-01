<?php
    include 'authenticate.php';
    include 'config.php';

    $result = $db->query("SELECT * FROM content");
    $data = [];

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $data[$row['content_key']] = str_replace('"',"&quot;",$row['content_value']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/svg/logo_icon.svg" type="image/svg">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <form class="mx-auto flex flex-col max-w-7xl p-8 gap-6 text-lg" action="upload.php" method="post" enctype="multipart/form-data">
        <h1 class="text-3xl font-bold border-b-2 border-gray-300 p-4 w-full flex items-center justify-between">
            Dashboard
            <a href="./logout.php">
                <button type="button" class="bg-red-500 text-white px-4 py-3 rounded-md text-lg">Log Out</button>
            </a>
        </h1>        
        <div class="flex gap-10 items-center px-4">
            <label class="font-bold flex-1">Website Title</label>
            <input class="px-4 py-3 rounded-md flex-1" type="text" name="website_title" placeholder="Wesbite Title" value="<?php echo $data['website_title'] ?>">
        </div>
        <div class="flex gap-10 items-center px-4">
            <label class="font-bold flex-1">Hero Heading</label>
            <input class="px-4 py-3 rounded-md flex-1" type="text" name="hero_heading" placeholder="Hero Heading" value="<?php echo $data['hero_heading'] ?>">
        </div>
        <div class="flex gap-10 items-center px-4">
            <label class="font-bold flex-1">Hero Side Content</label>
            <input class="px-4 py-3 rounded-md flex-1" type="text" name="hero_side_content" placeholder="Hero Side Content" value="<?php echo $data['hero_side_content'] ?>">
        </div>
        <div class="flex gap-10 items-center px-4">
            <label class="font-bold flex-1">Hero Button 1 Text</label>
            <input class="px-4 py-3 rounded-md flex-1" type="text" name="hero_button_1_text" placeholder="Hero Button 1 Text" value="<?php echo $data['hero_button_1_text'] ?>">
        </div>
        <div class="flex gap-10 items-center px-4">
            <label class="font-bold flex-1">Hero Button 2 Text</label>
            <input class="px-4 py-3 rounded-md flex-1" type="text" name="hero_button_2_text" placeholder="Hero Button 2 Text" value="<?php echo $data['hero_button_2_text'] ?>">
        </div>
        <div class="flex gap-10 items-center px-4">
            <label class="font-bold flex-1">Card 1 Heading</label>
            <input class="px-4 py-3 rounded-md flex-1" type="text" name="card_1_heading" placeholder="Card 1 Heading" value="<?php echo $data['card_1_heading'] ?>">
        </div>
        <div class="flex gap-10 items-center px-4">
            <label class="font-bold flex-1">Card 1 Content</label>
            <input class="px-4 py-3 rounded-md flex-1" type="text" name="card_1_content" placeholder="Card 1 Content" value="<?php echo $data['card_1_content'] ?>">
        </div>
        <div class="flex gap-10 items-center px-4">
            <label class="font-bold flex-1">Card 2 Heading</label>
            <input class="px-4 py-3 rounded-md flex-1" type="text" name="card_2_heading" placeholder="Card 2 Heading" value="<?php echo $data['card_2_heading'] ?>">
        </div>
        <div class="flex gap-10 items-center px-4">
            <label class="font-bold flex-1">Card 2 Content</label>
            <input class="px-4 py-3 rounded-md flex-1" type="text" name="card_2_content" placeholder="Card 2 Content" value="<?php echo $data['card_2_content'] ?>">
        </div>        
        <div class="flex gap-10 items-center px-4">
            <label for="card_3_image" class="font-bold flex-1">Card 3 Image</label>
            <input class="flex-1" type="file" name="card_3_image" id="card_3_image" accept="image/*">
        </div>
        <div class="flex gap-10 items-center px-4">
            <label for="card_4_image" class="font-bold flex-1">Card 4 Image</label>
            <input class="flex-1" type="file" name="card_4_image" id="card_4_image" accept="image/*">
        </div>
        <input class="w-full mt-2 bg-green-500 text-white p-4 rounded-md hover:cursor-pointer" type="submit" name="submit" value="Update">
    </form>
</body>
</html>
