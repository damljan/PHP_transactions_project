<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th,
        tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <!-- YOUR CODE -->
            <?php
            if (!empty($transactions)) {
                foreach ($transactions as $transaction) {
                    echo "<tr>";
                    echo "<td>";
                    echo formatDate($transaction['date']);
                    echo "</td>";
                    echo "<td>";
                    echo $transaction['checkNumber'];
                    echo "</td>";
                    echo "<td>";
                    echo $transaction['description'];
                    echo "</td>";
                    echo "<td>";
                    if ($transaction['amount'] >= 0) {
                        echo "<span style='color: green; font-weight: bold;'>" . formatDolarAmount($transaction['amount']) . "</span>";
                    } else {
                        echo "<span style='color: red; font-weight: bold;'>" . formatDolarAmount($transaction['amount']) . "</span>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td>
                    <!-- YOUR CODE -->
                    <?php
                    echo formatDolarAmount($totals['totalIncome']) ?? 0;
                    ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td>
                    <!-- YOUR CODE -->
                    <?php
                    echo formatDolarAmount($totals['totalExpense']) ?? 0;
                    ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td>
                    <!-- YOUR CODE -->
                    <?php
                    echo formatDolarAmount($totals['netTotal']) ?? 0;
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>