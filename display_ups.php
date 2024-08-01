<?php
// Connect to MySQL database
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "ups_measurements";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from equipment table
$query = 'SELECT * FROM equipment';
$result = $conn->query($query);

echo "Equipamento:\n";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " Nome: " . $row['name'] . " Descrição: " . $row['description'] . "\n";
    }
} else {
    echo "Não foram encontrados registos.\n";
}

// Retrieve data from ups_measurements table
$query = 'SELECT * FROM ups_measurements';
$result = $conn->query($query);

echo "\nMedições:\n";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo " ID " . $row['id'] . " ID Equipmento " . $row['equipment_id'] . " Data/Hora " . $row['timestamp'] . 
        " Vin (V) " . $row['tensao_in'] . " Vout (V) " . $row['tensao_out'] . " Vmin (V) " . $row['tensao_min'] . 
        " Vmax (V) " . $row['tensao_max'] . " Vbat (V) " . $row['tensao_bat'] . " Icarga (V) " . $row['corrente_carga'] . 
        " Temperatura Bat (°C) " . $row['temperatura_bat'] . " Tempo Funcionamento " . $row['temp_func'] . 
        " Uso Energia " . $row['uso_energia'] . " Frequência (Hz) " . $row['frequencia'] . " Estado Bat " . $row['estado_bat'] . "\n";
    }
} else {
    echo "Não foram encontrados registos.\n";
}

// Close the database connection
$conn->close();
