<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $title ?? 'My App' }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
  <div class="flex">
    <x-shared.upload-thesis-m />
    {{-- Sidebar --}}
  </div>
</body>
</html>
