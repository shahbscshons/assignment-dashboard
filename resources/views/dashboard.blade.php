<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <h1>Analytics Dashboard</h1>

    <canvas id="myChart" width="400" height="200"></canvas>

    <table>
        <thead>
            <tr>
                <th>Platform</th>
                <th>Metric Name</th>
                <th>Value</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($analyticsData as $data)
                <tr>
                    <td>{{ $data->platform }}</td>
                    <td>{{ $data->metric_name }}</td>
                    <td>{{ $data->value }}</td>
                    <td>{{ $data->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Google Analytics', 'Microsoft Clarity', 'Facebook', 'Instagram', 'Snapchat'],
                datasets: [{
                    label: 'Page Views',
                    data: [
                        @foreach($analyticsData as $data)
                            {{ $data->metric_name == 'page_views' ? $data->value : 0 }},
                        @endforeach
                    ],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
