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

                    <a href="{{ route('header')}}" type="button" class=" text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit Header</a>

                    <div class="flex flex-wrap gap-5">
                        <div class="max-w-xs  bg-white border border-gray-900 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            {{-- <img class="rounded-t-lg cover border border-gray-500" src="{{ asset('storage/' . $d->path) }}" alt="{{ $d->title }}" /> --}}
                        </div>
                    </div>
                    
                    <a href="{{ route('addmenu')}}" type="button" class=" text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Menu</a>

                    <a href="" type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium  focus:outline-none  rounded-lg border    focus:z-10 focus:ring-4 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700">Edit Priority</a>

                    <div class="flex flex-wrap gap-5">
                        @foreach ($data as $d)
                            <div class="max-w-xs  bg-white border border-gray-900 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="{{ $d->link }}">
                                    <img class="rounded-t-lg cover border border-gray-500" src="{{ asset('storage/' . $d->path) }}" alt="{{ $d->title }}" />
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-semi-bold tracking-tight text-gray-900 dark:text-white">{{ $d->title }}</h5>
                                    </a>

                                    <form action="{{ route('menu.edit', $d->id) }}" >
                                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                                    </form>

                                    <form action="{{ route('main.delete.action', $d->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
