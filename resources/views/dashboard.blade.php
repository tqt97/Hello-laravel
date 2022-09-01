<x-app-layout>
    <x-slot name="title">
        {{ __('Dashboard - Laravel application') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @php
        $users = App\Models\User::all();
        $categories = App\Models\Category::all();
        $posts = App\Models\Post::all();
        $tags = App\Models\Tag::all();
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
                    <a href="#" class="">
                        <div
                            class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">

                            <div
                                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>

                            </div>
                            <div class="text-right">
                                <p class="text-2xl">{{ $users->count() }}</p>
                                <p>Users</p>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('categories.index') }}">
                        <div
                            class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                            <div
                                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                                    >
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                                </svg>

                            </div>
                            <div class="text-right">
                                <p class="text-2xl">{{ $categories->count() }}</p>
                                <p>Categories</p>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('posts.index') }}">
                        <div
                            class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                            <div
                                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                                </svg>

                            </div>
                            <div class="text-right">
                                <p class="text-2xl">{{ $posts->count() }}</p>
                                <p>Posts</p>
                            </div>
                        </div>
                    </a>
                    <a href="">

                        <div
                            class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                            <div
                                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">

                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                                </svg>

                            </div>
                            <div class="text-right">
                                <p class="text-2xl">{{ $tags->count() }}</p>
                                <p>Tags</p>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- Recent Activity --}}
                <div class="mx-auto relative pl-8 pr-4 sm:pl-8 lg:pr-8 py-4 my-8 rounded-lg bg-white dark:bg-gray-800">
                    <div class="flex flex-wrap items-center justify-between">
                        <h1 class="text-xl sm:text-3xl font-bold text-gray-800 dark:text-gray-50">Recent Activity</h1>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 sm:h-6 sm:w-6 sm:-ml-8 text-gray-700 dark:text-gray-300 cursor-pointer hover:text-gray-800 dark:hover:text-gray-200"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </span>
                    </div>
                    <div class="border-l-2 mt-10">
                        <div
                            class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center pl-12 pr-2 sm:pl-0 sm:pr-0 sm:px-3 py-2 text-white rounded mb-5 flex-col md:flex-row space-y-5 md:space-y-0">
                            <div
                                class="w-8 h-8 bg-blue-200 dark:bg-gray-100 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 mx-auto mt-1.5 text-purple-600 dark:text-gray-700" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex-auto -ml-12 sm:-ml-16 md:-ml-0">
                                <h3 class="text-lg font-bold -mt-5 md:-mt-0 text-gray-700 dark:text-gray-200">Added New
                                    Interest <span class="font-medium text-purple-600 dark:text-gray-100">"Volunteer
                                        Activities"</span></h3>
                                <small class="text-gray-500 dark:text-gray-300">Today . 3.12 PM</small>
                            </div>
                        </div>
                        <div
                            class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center pl-12 pr-2 sm:pl-0 sm:pr-0 px-3 py-2  text-white  mb-5 flex-col md:flex-row space-y-5 md:space-y-0">
                            <div
                                class="w-8 h-8 bg-blue-200 dark:bg-gray-100 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 mx-auto mt-1.5 text-purple-600 dark:text-gray-700" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <div class="flex-auto -ml-12 sm:-ml-16 md:-ml-0">
                                <h3 class="text-lg font-bold -mt-5 md:-mt-0 text-gray-700 dark:text-gray-200">Responded
                                    to need <span class="font-medium text-purple-600 dark:text-gray-100">"In-Kind
                                        Opportunity"</span></h3>
                                <small class="text-gray-500 dark:text-gray-300">Today . 3.24 PM</small>
                            </div>
                        </div>
                        <div
                            class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center pl-12 pr-2 sm:pl-0 sm:pr-0 px-3 py-2 text-white rounded mb-5 flex-col md:flex-row space-y-5 md:space-y-0">
                            <div
                                class="w-8 h-8 bg-blue-200 dark:bg-gray-100 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 mx-auto mt-1.5 text-purple-600 dark:text-gray-700" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="flex-auto -ml-12 sm:-ml-16 md:-ml-0">
                                <h3 class="text-lg font-bold -mt-5 md:-mt-0 text-gray-700 dark:text-gray-200">Attending
                                    the event <span
                                        class="font-medium text-purple-600 dark:text-gray-100">"Extraordinary
                                        Event"</span></h3>
                                <small class="text-gray-500 dark:text-gray-300">Yesterday . 10.25 PM</small>
                            </div>
                        </div>
                        <div
                            class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center pl-12 pr-2 sm:pl-0 sm:pr-0 px-3 py-2 text-white rounded mb-5 flex-col md:flex-row space-y-5 md:space-y-0">
                            <div
                                class="w-8 h-8 bg-blue-200 dark:bg-gray-100 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 mx-auto mt-1.5 text-purple-600 dark:text-gray-700" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </div>
                            <div class="flex-auto -ml-12 sm:-ml-16 md:-ml-0">
                                <h3 class="text-lg font-bold -mt-5 md:-mt-0 text-gray-700 dark:text-gray-200">Created a
                                    New Event <span class="font-medium text-purple-600 dark:text-gray-100">"Volunteer
                                        Activities"</span></h3>
                                <small class="text-gray-500 dark:text-gray-300">Yesterday . 8.49 PM</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    </a>
</x-app-layout>
