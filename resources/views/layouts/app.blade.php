<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Halcon Web App')</title>
</head>
<body>
    <header>
        <h1>Halcon Web App</h1>
        <nav>
            <a href="{{ route('users.index') }}">Users</a>
            <a href="{{ route('orders.index') }}">Orders</a>
            <a href="{{ route('photos.index') }}">Photos</a>
            <a href="{{ route('roles.index') }}">Roles</a>
            <a href="{{ route('departments.index') }}">Departments</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
