<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <!-- yay! -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body style="margin:10%">

<div style="margin-bottom: 30px;
/* position: absolute; top:20px; */
">
<nav class="navbar navbar-expand-lg navbar-light" style="letter-spacing: 2px;">

  @if (Auth::check())
  <a class="nav-link"  href="/genres">GENRES</a>
  <a class="nav-link" href="/tracks">TRACKS</a>
  <a class="nav-link"  href="/invoices">INVOICES</a>
  <a class="nav-link"  href="/profile">PROFILE</a>
  <a class="nav-link"  href="/settings">SETTINGS</a>
  <a class="nav-link"  href="/logout">Logout</a>
  @else
  <a class="nav-link"  href="/login">Login</a>
  <a class="nav-link"  href="/signup">Sign Up</a>
  @endif




</nav>
</div>


<div class="container-fluid">
    <!-- this is now dynamic -->
@yield('main')
</div>

</body>
</html>
