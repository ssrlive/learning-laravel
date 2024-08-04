<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div>
            <h1>Todo list</h1>

            <div class="items-center justify-center mt-4">
                @foreach ($listItems as $listItem)
                    <div class="flex" style="align-items: center;">
                        <p class="text-lg"
                            style="{{ $listItem->is_completed ? 'text-decoration: line-through;' : '' }}">
                            Item {{ $listItem->id }}: {{ $listItem->name }}</p>
                        @if (!$listItem->is_completed)
                            <form method="POST" action="{{ route('markComplete', $listItem->id) }}"
                                accept-charset="UTF-8">
                                {{ csrf_field() }}
                                <button type="submit" class="border border-black rounded"
                                    style="max-height: 25px; margin-left: 20px;">Mark
                                    Complete</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>

            </br>
            <form method="POST" action="{{ route('saveItem') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <label for="listItem">New Todo Item</label></br>
                <input type="text" id="listItem" name="listItem"></br>
                <button type="submit" class="border border-black rounded">Save Item</button>
            </form>
        </div>
    </div>
</body>

</html>
