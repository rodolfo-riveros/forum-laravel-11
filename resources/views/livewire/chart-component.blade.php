<div>
    <canvas id="myChart"></canvas>
</div>

@script
    <script>
        const ctx = document.getElementById('myChart');
        const labels=@json($data).map(item=>item.pregunta);
        const values=@json($data).map(item=>item.respuestas);
        console.log(labels);
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Dataset 1',
                    data: values,
                    backgroundColor: ['Red', 'Orange', 'Yellow', 'Green', 'Blue'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Doughnut Chart'
                    }
                }
            }
        });
    </script>
@endscript
