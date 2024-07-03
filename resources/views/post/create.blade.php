@vite('resources/css/app.css')
<form class="max-w-md mx-auto p-4 bg-white rounded-lg shadow-lg" action="{{route('posts.store')}}" method="POST">
    @csrf

    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-semibold">Title</label>
        <input type="text" id="title" name="title" placeholder="Enter title" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-semibold">Description</label>
        <textarea id="description" name="description" rows="6" placeholder="Write your post description" class="w-full px-4 py-2 border rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
    </div>

    <button type="submit" class="w-full px-5 py-2 text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
        Create
    </button>
</form>