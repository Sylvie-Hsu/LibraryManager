<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <ul>
        <?php foreach ($books as $book):?>
            <li><?= $book->title; ?></li>
        <?php endforeach; ?>
    </ul>
    
</body>
</html>