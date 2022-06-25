<?php
$file=file('cache/cache.txt');
$_SESSION['studID'] = $file[0];
$_SESSION['lastName'] = $file[1];
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo "$_SESSION[studID]"; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/table.css')}}">
</head>
<body>
  
<div class="container">
    @yield('content')
</div>
  
</body>
</html>