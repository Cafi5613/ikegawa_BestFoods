<!DOCTYPE html>
<html>
<head>
	<title>ok</title>
</head>
<body>
@foreach($post as $p)
<h1>{{$p->getLat()}}</h1>
@endforeach
</body>
</html>