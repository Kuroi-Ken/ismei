<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/feather-icons"></script>
    <title>{{ $title }} | ISMEI Admin</title>
</head>

<body class="bg-gray-50 flex">
    
    <x-sidebar></x-sidebar>
    <section class="flex-1 p-6">
        {{ $slot }}
    </section>

    <script>
    feather.replace();
    </script>

</body>

</html>