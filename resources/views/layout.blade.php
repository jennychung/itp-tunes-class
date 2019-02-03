<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <!-- yay! -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body style="margin:10%">

<div style="margin-bottom: 30px;
/* position: absolute; top:20px; */
">
<nav class="navbar navbar-expand-lg navbar-light" style="letter-spacing: 2px;">
      <a class="nav-link"  href="/genres">GENRES</a>
      <a class="nav-link" href="/tracks">TRACKS</a>
</nav>
</div>


<div class="container-fluid">
    <!-- this is now dynamic -->
@yield('main')
</div>

</body>
</html>
