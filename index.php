<?php

class DataSource
{
    public function fetchItems()
    {
        // TODO: Implement fetching items from a data source
        // For the sake of this example, let's return some hardcoded data
        return [
            ['name' => 'Item 1', 'category' => 'Category A', 'price' => 10],
            ['name' => 'Item 2', 'category' => 'Category B', 'price' => 15],
            ['name' => 'Item 3', 'category' => 'Category A', 'price' => 20],
            ['name' => 'Item 4', 'category' => 'Category C', 'price' => 25],
            ['name' => 'Item 5', 'category' => 'Category B', 'price' => 30],
            ['name' => 'Item 6', 'category' => 'Category A', 'price' => 18],
            ['name' => 'Item 7', 'category' => 'Category C', 'price' => 22],
            ['name' => 'Item 8', 'category' => 'Category B', 'price' => 12],
            ['name' => 'Item 9', 'category' => 'Category A', 'price' => 27],
            ['name' => 'Item 10', 'category' => 'Category B', 'price' => 14],
        ];
    }
}

class ItemManager
{
    private $dataSource;

    public function __construct(DataSource $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    public function loadAndFilterItems($filterCriteria, $sortKey, $sortOrder)
    {
        $items = $this->dataSource->fetchItems();

        // Filtering based on a specific criteria
        $filteredItems = array_filter($items, function ($item) use ($filterCriteria) {
            // TODO: Implement your filtering logic based on the given criteria
            // For this example, let's filter items based on the category
            return $item['category'] === $filterCriteria;
        });

        // Sorting the filtered items
        usort($filteredItems, function ($a, $b) use ($sortKey, $sortOrder) {
            // TODO: Implement your sorting logic based on the given key and order
            // For this example, let's sort items by price in ascending order
            return $sortOrder === 'asc' ? $a[$sortKey] <=> $b[$sortKey] : $b[$sortKey] <=> $a[$sortKey];
        });

        return $filteredItems;
    }
}

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

