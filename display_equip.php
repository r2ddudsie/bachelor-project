<?php
// Connect to MySQL database
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "measurements";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from equipment table
$query = 'SELECT * FROM equipment';
$result = $conn->query($query);

echo "Equipamentos:\n";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " Nome: " . $row['name'] . " Descrição: " . $row['description'] . "\n";
    }
} else {
    echo "Não foram encontrados registos.\n";
}

// Retrieve data from measurements table
$query = 'SELECT * FROM measurements';
$result = $conn->query($query);

echo "\nMedições:\n";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo " ID " . $row['id'] . " ID Equipmento " . $row['equipment_id'] . " Data/Hora " . $row['timestamp'] . 
        " Vab (V) " . $row['tensao_ab'] . " Vbc (V) " . $row['tensao_bc'] . " Vca (V) " . $row['tensao_ca'] . 
        " V Média Fases (V) " . $row['tensao_fases'] . " Van (V) " . $row['tensao_an'] . " Vbn (V) " . $row['tensao_bn'] . 
        " Vcn (V) " . $row['tensao_cn'] . " V Média Neutro (V) " . $row['tensao_neutros'] . " Ia (A) " . $row['corrente_ia'] . 
        " Ib (A) " . $row['corrente_ib'] . " Ic (A) " . $row['corrente_ic'] . " I Média (A) " . $row['corrente_media'] . 
        " Potência Real (kW) " . $row['potencia_real'] . " Potencia Aparente (kVA) " . $row['potencia_aparente'] . 
        " Potência Reativa (kVAR) " . $row['potencia_reativa'] . " Frequência (Hz) " . $row['frequencia'] . "\n";
    }
} else {
    echo "Não foram encontrados registos.\n";
}

// Close the database connection
$conn->close();

