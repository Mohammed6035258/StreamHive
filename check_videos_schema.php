<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'streamhive';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "=== Connected to database: $database ===\n\n";

echo "1. TABLE STRUCTURE (DESCRIBE videos):\n";
echo "======================================\n";
$result = $conn->query("DESCRIBE videos");

if ($result) {
    printf("%-20s %-20s %-8s %-8s %-15s %-20s\n", "Field", "Type", "Null", "Key", "Default", "Extra");
    echo str_repeat("-", 100) . "\n";
    while ($row = $result->fetch_assoc()) {
        printf("%-20s %-20s %-8s %-8s %-15s %-20s\n",
            $row['Field'],
            $row['Type'],
            $row['Null'],
            $row['Key'],
            $row['Default'] ?? 'NULL',
            $row['Extra']
        );
    }
} else {
    echo "Error: " . $conn->error . "\n";
}

echo "\n\n";

echo "2. FULL CREATE TABLE STATEMENT:\n";
echo "================================\n";
$result = $conn->query("SHOW CREATE TABLE videos");

if ($result) {
    $row = $result->fetch_assoc();
    echo $row['Create Table'] . "\n\n";
} else {
    echo "Error: " . $conn->error . "\n";
}

echo "\n";

echo "3. TABLE STATISTICS:\n";
echo "====================\n";
$result = $conn->query("SELECT TABLE_NAME, ENGINE, TABLE_ROWS, DATA_LENGTH, INDEX_LENGTH FROM information_schema.TABLES WHERE TABLE_SCHEMA='$database' AND TABLE_NAME='videos'");

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    foreach ($row as $key => $value) {
        echo "$key: $value\n";
    }
} else {
    echo "No statistics found\n";
}

$conn->close();
?>
