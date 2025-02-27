<x-app-layout>
        <div class="container mx-auto mt-10">
            <div class="flex justify-center">
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                        <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                            <h4 class="text-xl font-semibold">Update Category</h4>
                            <a href="{{ url('category') }}" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                                Back home
                            </a>
                        </div>
                        <div class="p-4">
                            <form action="{{ route('category.update' , $category->id ) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="nom" value="{{$category->nom}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    @error('nom') <span class="text-red-500">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" value="{{$category->slug}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    @error('slug')<span class="text-red-500">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600 transition">Update</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
