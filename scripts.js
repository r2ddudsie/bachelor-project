function reloadPage() {
    location.reload();
}

let chart;

function loadData(equipment, equipmentName) {
    document.getElementById('dropdownMenuButton').textContent = equipmentName;
    fetch('./Assets/PHP/' + equipment + '.php?format=json')
        .then(response => response.json())
        .then(data => {
            loadTable(data);
            loadChart(data);
        });
    fetch('./Assets/PHP/' + equipment + '.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('tableContainer').innerHTML = data;
        });
}

function loadTable(data) {
    let tableHtml = '<div class="table-responsive"><table class="table table-striped"><thead><tr><th scope="col">#</th><th scope="col">Nome</th><th scope="col">Modelo</th><th scope="col">Capacidade</th><th scope="col">Status</th></tr></thead><tbody>';
    data.forEach(row => {
        tableHtml += `<tr><th scope="row">${row.id}</th><td>${row.nome}</td><td>${row.modelo}</td><td>${row.capacidade}</td><td>${row.status}</td></tr>`;
    });
    tableHtml += '</tbody></table></div>';
    document.getElementById('tableContainer').innerHTML = tableHtml;
}

function loadChart(data) {
    const labels = data.map(row => row.nome);
    const capacidades = data.map(row => parseInt(row.capacidade));

    const ctx = document.getElementById('chartContainer').getContext('2d');

    // Destrói o gráfico anterior, se existir
    if (chart) {
        chart.destroy();
    }

    chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Capacidade',
                data: capacidades,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
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
}