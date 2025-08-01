<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=isset($title) ? $title :"Document"?></title>
    <?php
    if (isset($css)) {
        Load::css($css);
    }
    ?>
</head>
<body>
    
