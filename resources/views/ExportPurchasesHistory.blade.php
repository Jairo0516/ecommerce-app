<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../vendor/autoload.php';
$filename = 'data';

header('Content-Description: File Transfer');
header('Content-Type: application/csv');
header("Content-Disposition: attachment; filename=$filename.csv");
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');


$handle = fopen('php://output', 'w');
ob_clean(); // clean slate

// Add CSV headers
fputcsv($handle, [
    'First Name',
    'Last Name',
    'Email',
    'Phone Number',
    'Date of Birth',
    'Gender',
    'Address',
    'Salary',
    'Skills'
]);

// Fetch and process data in chunks
foreach ($purchasesHistory as $item) {
    // Extract data from each employee.
    $data = [
        isset($item->purchases_history) ? $item->purchases_history : '',
        isset($item->user_id) ? $item->user_id : '',
        isset($item->foreign_exchange_id) ? $item->foreign_exchange_id : '',
        isset($item->product_id) ? $item->product_id : '',
        isset($item->quantity) ? $item->quantity : '',
        isset($item->product_value) ? $item->product_value : '',
        '',
        '',
        '',
    ];

    // Write data to a CSV file.
    fputcsv($handle, $data);
}

ob_flush(); // dump buffer

// Close CSV file handle
fclose($handle);


?>
