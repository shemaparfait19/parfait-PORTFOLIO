<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-6">
        <!-- Display success message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display error message -->
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <header class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Recent Works</h1>
            <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add Project
            </a>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($parfaits as $parfait)
            <div class="bg-gray-800 rounded-lg shadow-lg p-4">
                <h2 class="text-xl font-semibold">
                    <a href="{{ route('projects.show', $parfait->id) }}" class="text-blue-400 hover:underline">{{ $parfait->title }}</a>
                </h2>
                <p class="mt-2">{{ $parfait->description }}</p>
                <div class="mt-4 flex justify-between">
                    <a href="{{ route('projects.show', $parfait->id) }}" class="text-blue-400 hover:underline"> View Live</a>
                    <form action="{{ route('projects.destroy', $parfait->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                            Delete
                        </button>
                        <a href="{{ route('projects.edit', $parfait->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Project</a>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>