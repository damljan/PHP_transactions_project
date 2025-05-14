# PHP_transactions_project
A mini PHP project that involves parsing .csv files containing information about transactions (incomes and expenses), processing the data, and displaying it in a simple HTML table.

## 🧠 Application Logic

- All main logic goes inside the `app` directory. A default `app.php` file is provided, but you can organize the code as you prefer.
- The application should:
  - Read all `.csv` files located in the `transaction_files/` directory.
  - Assume all CSV files have the same structure.
  - Store data in memory (use an array).
  - Parse each row with the following format:
    1. **Date** of the transaction (`e.g., Jan 4, 2021`)
    2. **Check number** (optional)
    3. **Description** of the transaction
    4. **Amount** – positive values are income, negative values are expenses

## 📊 Output

- Calculate:
  - Total income
  - Total expense
  - Net total (income - expense)
- Display a clean HTML table with all transaction data.
- Amount formatting:
  - Green color for income (amount >= 0)
  - Red color for expenses (amount < 0)
- Use the provided HTML skeleton located in `views/transactions.php`.
