<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Admin Lucky Survey</title>

    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/css/style.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin">Admin Lucky Survey</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/admin">Dashboard</a></li>
                <li><a href="/admin/users">Users</a></li>
                <li><a href="/admin/survey">Surveys</a></li>
                <li><a href="/admin/groups">Groups</a></li>
            </ul>
            @include('layouts.parts.user_widget')
        </div><!--/.nav-collapse -->

    </div>
</nav>

<div class="container">

    @yield('content')

</div><!-- /.container -->

<footer class="footer">
    <div class="container">
        <p class="text-muted">&copy; LuckySurvey 2015</p>
    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

@yield('scripts')
</body>
</html>