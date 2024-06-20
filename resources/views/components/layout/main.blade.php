@props([
    'title'=>'',
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestscol -- {{ $title }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-slate-300">
    <header class="block bg-slate-800 py-4">
        <h1 class="text-slate-100 text-center">GestScol</h1>
    </header>
    <nav class="text-center bg-slate-500 py-2">
        <ul>
            <li class="inline">
                <a @if (request()->routeIs('student.*')) class="text-orange-400 font-bold" @else class="hover:text-orange-200" @endif href="{{ route('student.index') }}">Students</a>
            </li>
            <li class="inline">
                <a @if (request()->routeIs('formation.*')) class="text-orange-400 font-bold" @else class="hover:text-orange-200"
                @endif href="{{ route('formation.index') }}">Formations</a>
            </li>
        </ul>
    </nav>

    <main class="text-center">
        {{ $slot }}
    </main>

    <footer class="text-center block bg-slate-800 py-4">
        <p class="text-slate-100">Made with Laravel</p>
    </footer>
</body>
</html>