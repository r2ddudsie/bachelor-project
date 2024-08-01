<?php
// Create (connect to) SQLite database in file
$db = new SQLite3('ups_measurements.db');

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
    tensao_in REAL,
    tensao_out REAL,
    tensao_min REAL,
    tensao_max REAL,
    tensao_bat REAL,
    corrente_carga REAL,
    temperatura_bat REAL,
    temp_func REAL,
    uso_energia REAL,
    frequencia REAL,
    estado_bat REAL,
    FOREIGN KEY (equipment_id) REFERENCES equipment(id)
)';
$db->exec($query);

// Close the database connection
$db->close();

echo "Database and tables created successfully.";
?>
