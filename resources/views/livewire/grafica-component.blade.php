<div>
    <canvas id="myChartt"></canvas>
</div>

@script
    <script>
        const ctx = document.getElementById('myChartt');
        const labels = @json($data).map(item => item.categoria);
        const values = @json($data).map(item => item.respuestas);
        console.log(labels);
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: ['Red', 'Orange', 'Yellow', 'Green', 'Blue', 'Green', 'Black',
                        'Purple', ' Brown', 'Pink'
                    ],
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
                        text: 'Cantidad de preguntas por categoría',
                        font: {
                            size: 16, //tamaño del titulo
                        },
                        color: 'White' //color del titulo
                    }
                }
            }
        });
    </script>
@endscript
