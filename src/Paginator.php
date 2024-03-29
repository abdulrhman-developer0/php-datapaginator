<?php

namespace AbdulrhmanDeveloper0\PhpDatapaginator;

class Paginator
{
    protected array $items;

    protected int $itemsPerPage;

    public function __construct(array $items = [], int $itemsPerPage = 10)
    {
        // initialize paginatior.
        $this->itemsPerPage = $itemsPerPage;
        $this->items = $items;
    }

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

    public function getFirstPage(): int|null
    {
        $last = $this->getLastPage();

        return !$last
            ? null
            : 1;
    }

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
