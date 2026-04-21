<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="{{ asset('tinymce/js/tinymce.min.js') }} referrerpolicy="origin"></script>

    <title>{{ $title }} | ISMEI Admin</title>
</head>

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        
        <aside class="shrink-0 h-screen sticky top-0">
            <x-sidebar></x-sidebar>
        </aside>

        <main class="flex-1 min-w-0 h-screen overflow-y-auto p-6 transition-all duration-300">
            {{ $slot }}
        </main>

    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>