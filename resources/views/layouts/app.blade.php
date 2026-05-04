<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FUDi-gital</title>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Setting Tailwind -->
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    poppins: ['Poppins', 'sans-serif'],
                }
            }
        }
    }
</script>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

/* tombol panah */
.btn-nav {
    background: white;
    border: 1px solid #ddd;
    padding: 6px 10px;
    border-radius: 8px;
    font-size: 12px;
    transition: 0.2s;
}
.btn-nav:hover {
    background: #3b82f6;
    color: white;
}
</style>

</head>

<body class="bg-gray-100 font-poppins">

    @yield('content')

    @stack('scripts')

</body>
</html>