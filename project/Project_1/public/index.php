<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR; # PROJECT_1/

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR); # const APP_PATH: PROJECT_1/app/
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR); # const FILES_PATH: PROJECT_1/transaction_files/
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR); # const VIEWS_PATH: PROJECT_1/views/

/* YOUR CODE */
require APP_PATH . 'app.php'; # ukljuci PROJECT_1/app/app.php u index.php
require APP_PATH . 'helpers.php'; # ukljuci PROJECT_1/app/helpers.php u index.php

$files = getTransactionFiles(FILES_PATH);

// echo "<pre>";
// print_r($files);
// echo "<pre/>";

$transactions = [];
foreach($files as $file) {
    $transactions = array_merge($transactions, getTransactions($file, 'extractTransaction'));
}

// echo "<pre>";
// print_r($transactions);
// echo "<pre/>";

$totals = calculateTotals($transactions);

require VIEWS_PATH . 'transactions.php';


