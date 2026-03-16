<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/feather-icons"></script>
    <title>{{ $title }} | ISMEI Admin</title>
</head>

<body class="bg-gray-50">

    <div class="flex h-screen overflow-hidden">
        <aside class="w-2xs shrink-0 h-screen overflow-y-auto">
            <x-sidebar></x-sidebar>
        </aside>

        <main class="flex-1 h-screen overflow-y-auto p-6">
            {{ $slot }}
        </main>

    </div>

    <script>
        feather.replace();
    </script>

</body>

</html>