<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 @foreach ($areas as $area)
            <div class="col-xs-4">{{ $area->nombre }}</div>
 @endforeach

</body>
</html>