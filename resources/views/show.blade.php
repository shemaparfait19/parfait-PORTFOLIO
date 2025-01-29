<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parfait Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-6">
        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <h1 class="text-4xl font-bold mb-4">{{ $parfait->title }}</h1>
            <p class="mb-4 text-lg">{{ $parfait->description }}</p>
            <p class="mb-4"><strong class="text-lg">Category:</strong> <span class="text-gray-400">{{ $parfait->category }}</span></p>
            <p class="mb-4"><strong class="text-lg">Technologies:</strong> <span class="text-gray-400">{{ $parfait->technologies }}</span></p>
            @if($parfait->image)
                <img src="{{ $parfait->image }}" alt="Project Image" class="mb-4 rounded-lg shadow-md">
            @else
                <p class="text-red-500">Image not available.</p>
            @endif
            <p class="mb-4"><strong class="text-lg">GitHub Link:</strong> <a href="{{ $parfait->github_link }}" class="text-blue-400 hover:underline">{{ $parfait->github_link }}</a></p>
            <p class="mb-4"><strong class="text-lg">Live Link:</strong> <a href="{{ $parfait->live_link }}" class="text-blue-400 hover:underline">{{ $parfait->live_link }}</a></p>
            <div class="mt-6 flex space-x-4">
                <a href="{{ route('projects.edit', $parfait->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200">Edit Parfait</a>
                <form action="{{ route('projects.destroy', $parfait->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-200">Delete Parfait</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>