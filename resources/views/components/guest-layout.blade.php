<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>{{ $title ?? 'Welcome' }} | ISMEI</title>
</head>
<body class="bg-gray-50 font-sans antialiased">
    
    {{ $slot }}

    <script>
        feather.replace();
    </script>
</body>
</html>