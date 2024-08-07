<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 h-screen bg-white dark:bg-gray-800 shadow-md">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="text-2xl font-semibold mb-6">Dashboard</div>
                <ul>
                    <li class="mb-4">
                        <a href="/questions" class="text-gray-900 dark:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-700 p-3 block rounded">Questions</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="text-gray-900 dark:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-700 p-3 block rounded">Profile</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="text-gray-900 dark:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-700 p-3 block rounded">Topics</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <x-app-layout>
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                </x-slot>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                {{ __("You're logged in!") }}
                            </div>
                        </div>
                    </div>
                </div>
            </x-app-layout>
        </div>
    </div>
</body>
</html>
