<?php
// Create (connect to) SQLite database in file
$db = new SQLite3('measurements.db');

// Create a table for equipment
$query = 'CREATE TABLE IF NOT EXISTS equipment (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    description TEXT
)';
$db->exec($query);

// Create a table for measurements
$query = 'CREATE TABLE IF NOT EXISTS measurements (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    equipment_id INTEGER,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    tensao_ab REAL,
    tensao_bc REAL,
    tensao_ca REAL,
    tensao_fases REAL,
    tensao_an REAL,
    tensao_bn REAL,
    tensao_cn REAL
    tensao_neutros REAL,
    corrente_ia REAL,
    corrente_ib REAL,
    corrente_ic REAL,
    corrente_media REAL,
    potencia_real REAL,
    potencia_aparente REAL,
    potencia_reativa REAL,
    frequencia REAL,
    FOREIGN KEY (equipment_id) REFERENCES equipment(id)
)';
$db->exec($query);

// Close the database connection
$db->close();

echo "Database and tables created successfully.";
?>
