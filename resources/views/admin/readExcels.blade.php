<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action='showExcels' method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<label>import excels</label>
	<input type="file" name="fileExcels"></br>
	<button type="submit">Import</button>
	</form>
</body>
</html>