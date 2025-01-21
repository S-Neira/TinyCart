<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TinyCart | inventory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-300 mx-10">
    
    <x-header/>
    
    <h1 class="text-4xl font-extrabold text-center text-gray-800 my-8 w-auto">
        Control Inventario
    </h1>

    <div style="width: 70%; margin: auto; padding-top: 50px;">
        <h2 style="text-align: center;">Inventario de Productos</h2>
        <canvas id="inventoryChart"></canvas>
    </div>

    <script>
        // Configurar el gráfico con los datos enviados desde el controlador
        const ctx = document.getElementById('inventoryChart').getContext('2d');
        const inventoryChart = new Chart(ctx, {
            type: 'bar', // Tipo de gráfico (bar, line, pie, etc.)
            data: {
                labels: {!! json_encode($labels) !!}, // Etiquetas (nombres de productos)
                datasets: [{
                    label: 'Cantidad en Stock',
                    data: {!! json_encode($data) !!}, // Datos (stock de cada producto)
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)', // Color de las barras
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true, // Mostrar la leyenda
                    },
                    tooltip: {
                        enabled: true, // Habilitar los tooltips
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true // El eje Y empieza en 0
                    }
                }
            }
        });
    </script>

    <x-footer/>

</body>
</html>