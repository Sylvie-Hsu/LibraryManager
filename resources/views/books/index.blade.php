<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <ul>
	        <?php foreach ($books as $value):?>
	            <li>
	            	<a 
	            		href="/books/{{ $value->bno}}">
	            		{{ $value->title}}	
	            	</a>
	            </li>
	        <?php endforeach; ?>
    </ul>
</body>
</html>