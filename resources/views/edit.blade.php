<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Parfait</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Edit Parfait</h1>
        <form action="{{ route('projects.update', $parfait->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium">Title</label>
                <input type="text" name="title" id="title" value="{{ $parfait->title }}" required class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Description</label>
                <textarea name="description" id="description" required class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">{{ $parfait->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium">Category</label>
                <input type="text" name="category" id="category" value="{{ $parfait->category }}" class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">
            </div>
            <div class="mb-4">
                <label for="technologies" class="block text-sm font-medium">Technologies</label>
                <input type="text" name="technologies" id="technologies" value="{{ $parfait->technologies }}" class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium">Image</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">
            </div>
            <div class="mb-4">
                <label for="github_link" class="block text-sm font-medium">GitHub Link</label>
                <input type="url" name="github_link" id="github_link" value="{{ $parfait->github_link }}" class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">
            </div>
            <div class="mb-4">
                <label for="live_link" class="block text-sm font-medium">Live Link</label>
                <input type="url" name="live_link" id="live_link" value="{{ $parfait->live_link }}" class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">
            </div>
            <div class="mb-4">
                <label for="is_featured" class="flex items-center">
                    <input type="checkbox" name="is_featured" id="is_featured" {{ $parfait->is_featured ? 'checked' : '' }} class="mr-2">
                    <span class="text-sm font-medium">Is Featured?</span>
                </label>
            </div>
            <div class="mb-4">
                <label for="order" class="block text-sm font-medium">Order</label>
                <input type="number" name="order" id="order" value="{{ $parfait->order }}" class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Parfait</button>
        </form>
    </div>
</body>
</html>