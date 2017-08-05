<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="This is a student exercise website for the Vancouver Institute of Media Arts">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <title>Admin panel</title>
</head>
<body>
    <header class="navbar navbar-inverse">
        <div class="container">
            <span class="navbar-brand text_logo">Admin panel</span>
            <ul class="nav navbar-nav navbar-right">
                <li class="navbar-li"><a href="/">go to the site</a></li>
                <li class="navbar-li"><a href="/admin/auth/logout">logout</a></li>
            </ul>
        </div>
    </header>
    <main class="container">
        <?=$sideBar ?? ''?>
        <?=$pageContent ?? ''?>
    </main>
    <script src="/js/admin/js"></script>
</body>
</html>