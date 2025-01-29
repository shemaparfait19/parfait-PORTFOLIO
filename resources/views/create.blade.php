<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Parfait</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Add New Project</h1>
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium">Title</label>
                <input type="text" name="title" id="title" required class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Description</label>
                <textarea name="description" id="description" required class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded"></textarea>
            </div>
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium">Category</label>
                <input type="text" name="category" id="category" class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">
            </div>
            <div class="mb-4">
                <label for="technologies" class="block text-sm font-medium">Technologies</label>
                <input type="text" name="technologies" id="technologies" class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium">Image Link</label>
                <input type="url" name="image" id="image" class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">
            </div>
            <div class="mb-4">
                <label for="github_link" class="block text-sm font-medium">GitHub Link</label>
                <input type="url" name="github_link" id="github_link" class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">
            </div>
            <div class="mb-4">
                <label for="live_link" class="block text-sm font-medium">Live Link</label>
                <input type="url" name="live_link" id="live_link" class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">
            </div>
            <div class="mb-4">
                <label for="is_featured" class="flex items-center">
                    <input type="checkbox" name="is_featured" id="is_featured" class="mr-2">
                    <span class="text-sm font-medium">Is Featured?</span>
                </label>
            </div>
            <div class="mb-4">
                <label for="order" class="block text-sm font-medium">Order</label>
                <input type="number" name="order" id="order" value="0" class="mt-1 block w-full p-2 bg-gray-800 border border-gray-700 rounded">
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Project</button>
        </form>
    </div>
</body>
</html>
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif