<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 
         leading-tight">
            {{ __('Menu Admin   ') }}
        </h2>
    </x-slot>
<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    <div class="flex flex-wrap gap-5">
                        <div class="max-w-xs  bg-white border border-gray-900 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        </div>
                    </div>                
                    <a href="{{ route('addmenu')}}" type="button" class=" text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Menu</a>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-16 py-3">
                                        <span class="sr-only">Image</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Menu Info/link
                                    </th>
                                    {{-- <th scope="col" class="px-6 py-3">
                                        Priority
                                    </th> --}}
                                    <th scope="col" class="px-6 py-3">
                                        Edit
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-4">
                                        <img src="{{ asset('storage/' . $d->path) }}" class="w-16 md:w-32 max-w-full max-h-full" alt="{{ $d->title }}">
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        {{ $d->title }} => {{$d->link}}
                                    </td>
                                    {{-- <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div>   
                                                <input readonly type="number" name="priority" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$d->priority}}" />
                                            </div>
                                        </div>
                                    </td> --}}
                                    <form action="{{ route('menu.edit', $d->id) }}" >
                                    <td class="px-6 py-4">
                                        <button type="link" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                    </form>

                                    <form action="{{ route('main.delete.action', $d->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <td class="px-6 py-4">
                                        <button type="link" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                                    </td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
