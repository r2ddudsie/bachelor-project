<?php
$data = [];
for ($i = 1; $i <= 20; $i++) {
    $data[] = [
        'id' => $i,
        'nome' => 'Transformador ' . $i,
        'modelo' => 'Modelo ' . chr(64 + $i),
        'capacidade' => (1000 * $i) . 'kVA',
        'status' => $i % 2 == 0 ? 'Ativo' : 'Inativo'
    ];
}

// Verifica se a solicitação é para JSON
if (isset($_GET['format']) && $_GET['format'] == 'json') {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

// Exibe a tabela HTML
echo '
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Modelo</th>
                <th scope="col">Capacidade</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>';
foreach ($data as $row) {
    echo '
            <tr>
                <th scope="row">' . $row['id'] . '</th>
                <td>' . $row['nome'] . '</td>
                <td>' . $row['modelo'] . '</td>
                <td>' . $row['capacidade'] . '</td>
                <td>' . $row['status'] . '</td>
            </tr>';
}
echo '
        </tbody>
    </table>
</div>';
?>
