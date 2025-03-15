<?php
require_once('./Userdetail.php');
?>
<!-- krab chartjs -->
<div class="col">
    <canvas id="myChart" width="300" height="150"></canvas>
    <script>
        // Get the canvas element
        var ctx = document.getElementById('myChart').getContext('2d');

        // Create a new chart
        var myChart = new Chart(ctx, {
            type: 'line', // Specifies the type of chart
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'], // X-axis labels
                datasets: [{
                    label: 'Sales Over Time', // Label for the line
                    data: [12, 19, 3, 5, 2, 3], // Y-axis data points
                    borderColor: 'rgba(75, 192, 192, 1)', // Line color
                    borderWidth: 1,
                    fill: false // No filling under the line
                }]
            },
            options: {
                responsive: true, // Chart is responsive
                scales: {
                    y: {
                        beginAtZero: true // Start the Y-axis at 0
                    }
                }
            }
        });

    </script>