<?php
require_once('./Userdetail.php');
?>
<!-- krab chartjs -->
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 100vh; */
        margin: 0;
    }

    .chart-container {
        width: 80%;
        max-width: 660px;
        padding: 20px;
        background: #fff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin: 10px;
    }
</style>
</head>

<body>

    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'july', 'August', 'September', 'October', 'Noverber', 'December'],
                datasets: [{
                    label: 'Sales Over Time',
                    data: [12, 19, 4, 8, 4, 6, 9, 4, 9, 4, 5, 2],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Light fill color
                    borderWidth: 2,
                    fill: true, // Add fill under the line
                    tension: 0.4, // Smooth curves
                    pointBackgroundColor: 'white',
                    pointBorderColor: 'rgba(75, 192, 192, 1)',
                    pointRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 14,
                                family: 'Poppins'
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12,
                                family: 'Poppins'
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(200, 200, 200, 0.3)'
                        },
                        ticks: {
                            font: {
                                size: 12,
                                family: 'Poppins'
                            }
                        }
                    }
                }
            }
        });
    </script>