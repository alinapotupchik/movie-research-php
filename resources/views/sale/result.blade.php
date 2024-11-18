@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Sales Distribution for {{ \Carbon\Carbon::parse($soldAt)->toFormattedDateString() }}</h2>

        <div class="chart-container" style="position: relative; width: 50%; margin: auto;">
            <canvas id="salesChart"></canvas>
        </div>

        <h3 class="mt-4">Top Theater: {{ $topTheater->name }}</h3>
        <p>Total Tickets Sold: {{ $topTheater->total_tickets }}</p>

        <a href="{{ route('sale.show') }}" class="btn btn-secondary mt-3">Search Another Date</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('salesChart').getContext('2d');
            var theaterNames = @json($theaterSales->pluck('name'));
            var ticketCounts = @json($theaterSales->pluck('total_tickets'));

            var chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: theaterNames,
                    datasets: [{
                        label: 'Tickets Sold',
                        data: ticketCounts,
                        backgroundColor: [
                            '#FF6384',
                            '#36A2EB',
                            '#FFCE56',
                            '#2ecc71',
                            '#e74c3c',
                            '#8e44ad',
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        title: {
                            display: true,
                            text: 'Tickets Sold by Theater'
                        }
                    }
                }
            });
        });
    </script>
@endsection
