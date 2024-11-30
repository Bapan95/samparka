<x-app-layout>
    <x-slot name="header">
        {{-- <h1>Welcome to Samparka</h1> --}}
        <h6 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight text-center">ভারতের কমিউনিস্ট পার্টি
            (মার্কসবাদী)</h6>
        <h6 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight text-center">জাঙ্গীপাড়া এরিয়া কমিটি ২০
        </h6>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Overview Cards -->
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold">Total Memberships</h3>
                    <p class="text-2xl">{{ $membershipCount }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold">Total Articles</h3>
                    <p class="text-2xl">{{ $articleCount }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold">Total Comments</h3>
                    <p class="text-2xl">{{ $commentCount }}</p>
                </div>
            </div>

            <!-- Memberships by Month Chart -->
            <div class="grid grid-cols-3 gap-4">

                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Memberships by Month</h3>
                    <canvas id="membershipsChart"></canvas>
                </div>

                <!-- Articles by Month Chart -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Articles by Month</h3>
                    <canvas id="articlesChart"></canvas>
                </div>

                <!-- Comments by Article Chart -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Comments by Article</h3>
                    <canvas id="commentsChart"></canvas>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Memberships by Month
        const membershipsChart = new Chart(document.getElementById('membershipsChart'), {
            type: 'bar',
            data: {
                labels: @json($membershipsByMonth->pluck('month')),
                datasets: [{
                    label: 'Memberships',
                    data: @json($membershipsByMonth->pluck('count')),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
        });

        // Articles by Month
        const articlesChart = new Chart(document.getElementById('articlesChart'), {
            type: 'line',
            data: {
                labels: @json($articlesByMonth->pluck('month')),
                datasets: [{
                    label: 'Articles',
                    data: @json($articlesByMonth->pluck('count')),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
        });

        // Comments by Article
        const commentsChart = new Chart(document.getElementById('commentsChart'), {
            type: 'pie',
            data: {
                labels: @json($commentsByArticle->pluck('article_id')),
                datasets: [{
                    label: 'Comments',
                    data: @json($commentsByArticle->pluck('count')),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)'
                    ]
                }]
            },
        });
    </script>
</x-app-layout>
