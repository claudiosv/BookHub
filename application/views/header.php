<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<ul id="dropdown1" class="dropdown-content">
    <li><a href="/reports">Reports</a></li>
    <li class="divider"></li>
    <li><a href="/archive">Archive</a></li>
    <li class="divider"></li>
    <li><a href="/books/upload">Add Book</a></li>
    <li><a href="/category/add">Add Category</a></li>
    <li><a href="/author/add">Add Author</a></li>
    <li><a href="/publisher/add">Add Publisher</a></li>
</ul>
<nav class="deep-purple lighten-1">
    <div class="nav-wrapper container">
        <a href="/" class="brand-logo"><i class="material-icons">book</i>BookHub</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/books/search"><i class="material-icons left">search</i> Search</a></li>
            <li><a href="/books"><i class="material-icons left">book</i> Books</a></li>
            <li><a href="/publisher/view"><i class="material-icons left">business_center</i> Publishers</a></li>
            <li><a href="/author/view"><i class="material-icons left">person</i> Authors</a></li>
            <li><a href="/category/view"><i class="material-icons left">view_list</i> Categories</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons">more_vert</i></a></li>
        </ul>

    </div>

</nav>
