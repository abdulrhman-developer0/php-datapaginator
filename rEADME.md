# PhpDatapaginator

---

### Installation

Use this command to install the package in your project.

```
    composer require abdulrhman-developer0/php-datapaginator
```

### Simple Usge

Example:
```php
<?php

    use AbdulrhmanDeveloper0\PhpDatapaginator\Paginator;

    // the dumy data to paginate.
    $items =  array_fill(0, 100, 'page item');

    // using the paginator.
    $paginator = new Paginator($items, 10);

    // get a specified page items.
    $page2 = $paginator->get(2);
```

---

### Paginator

Example:
```php
   $paginator = new Paginator($data, 20);
```

More about this class constructor:
```php
    /**
     * Initialize the paginator class
     * 
     * @param array $items The data to split as pages.
     * @param int $itemsPerPage The count of items per page
     */
    public function __construct(array $items = [], int $itemsPerPage = 10)
```

---

### Available Methods
In this part of the documentation we will learn about the methods available for use in this package.

<br><br>

```php
    /**
     * Retrieve items for any page through the page index
     * 
     * @param int $pageNumber The page index
     * @return array The items of the page
     */
    public function get(int $pageNumber): array;
```

```php
    /**
     * @return int|null Retunr the first page index if exists or null if not
     */
    public function getFirstPage(): int|null;
```

```php
    /**
     * @return int|null Retunr the last page index if exists or null if not
     */
    public function getLastPage(): int|null;
```