<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
            table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }

            td, th {
              border: 1px solid #dddddd;
              text-align: left;
              padding: 8px;
            }

            tr:nth-child(even) {
              background-color: #dddddd;
            }
            .button-link {
                display: inline-block;
                padding: 8px 16px; /* Adjust the padding to your liking */
                background-color: #3490dc; /* Button background color */
                color: #ffffff; /* Button text color */
                text-align: center;
                text-decoration: none;
                border-radius: 999px; /* Create a rounded button shape */
                transition: background-color 0.3s ease-in-out;
                margin:4px;
            }

            .button-link:hover {
                background-color: #217eb3; /* Change the background color on hover */
            }
            </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
