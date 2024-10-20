<!-- resources/views/components/layout.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <header class="bg-white dark:bg-gray-800 shadow mt-12">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 mb-0">
                {{ $header ?? '' }}
            </div>
        </header>

        <main class="flex-grow">
            {{ $slot }}
        </main>

        <footer class="bg-blue-600 text-white p-2">
            <div class="container mx-auto text-center">
                &copy; {{ date('Y') }} Samparka. All Rights Reserved.
            </div>
        </footer>
    </div>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Check if the DataTable is already initialized and destroy it if it is
            if ($.fn.DataTable.isDataTable('#example1')) {
                $('#example1').DataTable().destroy();
            }

            // Initialize the DataTable
            $('#example1').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
    <script>
        // Force reload on back button press
        // (function() {
        //     alert("Welcome");
        //     window.history.forward();
        //     window.onunload = function() {
        //         null
        //     };
        // })();
    </script>
</body>

</html>
