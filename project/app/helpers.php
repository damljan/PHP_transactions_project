<?php

declare(strict_types = 1);

function formatDolarAmount(float $amount): string {

    $isNegative = $amount < 0;

    if($isNegative) {
        return "-$" . number_format(abs($amount), 2);
    } else {
        return "$" . number_format(abs($amount), 2);
    }
}

function formatDate(string $date): string {
    return date('M d, Y', strtotime($date)); // mora drugi parametar kako ne bi bio samo danasnji datum
}