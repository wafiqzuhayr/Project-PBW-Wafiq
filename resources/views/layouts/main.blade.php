<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        /* Navbar */
        nav {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1rem 2rem;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            gap: 2rem;
        }

        .nav-link {
            text-decoration: none;
            color: #333;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
        }

        .nav-link:hover {
            background: #e0e0e0;
        }

        .nav-link.active {
            background: #2196F3;
            color: white;
        }

        /* Content */
        .content {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .page {
            display: none;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .page.active {
            display: block;
        }

        h1 {
            color: #333;
            margin-bottom: 1rem;
        }

        p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        /* Berita */
        .news-item {
            border-bottom: 1px solid #eee;
            padding: 1rem 0;
        }

        .news-item:last-child {
            border-bottom: none;
        }

        .news-date {
            color: #2196F3;
            font-size: 0.9rem;
            font-weight: bold;
        }

        .news-title {
            color: #333;
            margin: 0.5rem 0;
        }

        /* Profile */
        .profile-info {
            margin: 1rem 0;
        }

        .profile-info strong {
            color: #333;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-blue bg-blue">
        <ul class="nav-menu">
            <li><a class="nav-link {{$title === 'Home' ? 'active' : ''}}" href="/">Home</a></li>
            <li><a class="nav-link {{$title === 'Berita' ? 'active' : ''}}" href="/berita">Berita</a></li>
            <li><a class="nav-link {{$title === 'Profile' ? 'active' : ''}}" href="/profile">Profile</a></li>
            <li><a class="nav-link {{$title === 'Contact' ? 'active' : ''}}" href="/contact">Contact</a></li>
            <li><a class="nav-link {{$title === 'About' ? 'active' : ''}}" href="/about">About</a></li>
        </ul>
    </nav>

    <div class="container py-5">
           @yield('content') 
        </div>


</body>
</html