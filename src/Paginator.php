<?php

namespace AbdulrhmanDeveloper0\PhpDatapaginator;

class Paginator
{
    protected array $items;

    protected int $itemsPerPage;

    /**
     * Initialize the paginator class
     * 
     * @param array $items The data to split as pages.
     * @param int $itemsPerPage The count of items per page
     */
    public function __construct(array $items = [], int $itemsPerPage = 10)
    {
        // initialize paginatior.
        $this->itemsPerPage = $itemsPerPage;
        $this->items = $items;
    }

    /**
     * Retrieve items for any page through the page index
     * 
     * @param int $pageNumber The page index
     * @return array The items of the page
     */
    public function get(int $pageNumber): array
    {
        if ($pageNumber <= 0) {
            return [];
        }

        if ($pageNumber > $this->getLastPage()) {
            return [];
        }

        $pageLength = $this->itemsPerPage;



        $pageStart = $pageNumber == 1
            ? 0
            : (0 + $pageLength) * ($pageNumber - 1);

        return array_slice($this->items, $pageStart, $pageLength);
    }

    /**
     * @return int|null Retunr the first page index if exists or null if not
     */
    public function getFirstPage(): int|null
    {
        $last = $this->getLastPage();

        return !$last
            ? null
            : 1;
    }

    /**
     * @return int|null Retunr the last page index if exists or null if not
     */
    public function getLastPage(): int|null
    {
        if ($this->items == []) {
            return  null;
        }

        $itemsLength = count($this->items);

        return ($itemsLength % $this->itemsPerPage) > 0
            ?  ($itemsLength / $this->itemsPerPage) + 1
            : ($itemsLength / $this->itemsPerPage);
    }
}
