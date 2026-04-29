<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FUDi-gital</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CSS kamu -->
    <link rel="stylesheet" href="{{ asset('css/loginpage.css') }}">
</head>

<body class="@yield('body-class')">

    @yield('content')

    @stack('scripts')

</body>
</html>