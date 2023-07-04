# Item Management System

This code demonstrates an item management system that loads items from a data source, filters and sorts the data based on given criteria, and displays the resulting list.

## Features

- Loading items from a data source
- Filtering items based on a specific criteria
- Sorting items based on a given key and order
- Displaying the filtered and sorted list of items

## Requirements

- PHP 7.0 or higher

## Usage

1. Clone the repository or download the source code files.

2. Open the code in a text editor or an IDE of your choice.

3. Customize the code as needed:
   - Update the `fetchItems` method in the `DataSource` class to fetch items from an actual data source.
   - Modify the filtering and sorting logic in the `loadAndFilterItems` method of the `ItemManager` class to meet your specific requirements.
   - Adjust the output formatting in the `foreach` loop in the example usage section to display the item details as desired.

4. Run the code:
   - If you have PHP installed globally, you can run the code from the command line:
     ```
     $ php filename.php
     ```
   - Alternatively, you can run the code using a local development server or a PHP runtime environment.

5. View the output in the console or the browser, depending on how you execute the code.

## Example Usage

The provided code demonstrates an example usage scenario where items are filtered based on the category 'Category A' and sorted by price in ascending order.

```php
$dataSource = new DataSource();
$itemManager = new ItemManager($dataSource);

// Example usage: Loading, sorting, and filtering items
$filterCriteria = 'Category A';
$sortKey = 'price';
$sortOrder = 'asc';

$filteredItems = $itemManager->loadAndFilterItems($filterCriteria, $sortKey, $sortOrder);

// Displaying the resulting list
echo "Filtered Items:\n";
echo "----------------\n";
foreach ($filteredItems as $item) {
    echo "Name: {$item['name']}\n";
    echo "Category: {$item['category']}\n";
    echo "Price: {$item['price']} USD\n";
    echo "----------------\n";
}
