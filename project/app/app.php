<?php

declare(strict_types = 1);

// Your Code
function getTransactionFiles(string $dirPath): array {
    $files = [];

    foreach(scandir($dirPath) as $file) {
        if(is_dir($file)) {
            continue;
        }

        $files[] = $dirPath . $file;
    }

    return $files;
}

function getTransactions(string $fileName, ?callable $transactionHandler = null): array {
    if(!file_exists($fileName)) {
        trigger_error("File " . $fileName . " does not exist!", E_USER_ERROR);
    }

    $file = fopen($fileName, 'r');

    fgetcsv($file); # skidanje prve linije u fajlu koja nije transakcija

    $transactions = [];

    while(($transaction = fgetcsv($file)) !== false) { # moraju zagrade ($transaction = fgetcsv($file))
        if($transactionHandler !== null) {
            $transaction = $transactionHandler($transaction);
        }
        $transactions[] = $transaction;
    }

    return $transactions;
}

function extractTransaction(array $transactionRow): array {

    [$date, $checkNumber, $description, $amount] = $transactionRow;

    $amount = (float)str_replace(['$', ','], '', $amount); 
    # ukloni znak $ i zarez , iz $amount - str_replace($sta_tražiš, $čime_zameniš, $gde);

    return [
        'date' => $date,
        'checkNumber'=> $checkNumber,
        'description' => $description,
        'amount' => $amount
    ];
}

function calculateTotals(array $transactions): array {

    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount'];

        if($transaction['amount'] >= 0) {
            $totals['totalIncome'] += $transaction['amount'];
         } else {
            $totals['totalExpense'] += $transaction['amount'];
        }
    }

    return $totals;
}