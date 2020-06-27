<?php
namespace App\Helper\Pagination;

use Illuminate\Support\Collection;

class PaginationHelper
{
    public $collection;
    public $per_page;
    public $total_page;
    public $total_item;

    public function __construct(Collection $collection, $per_page)
    {
        $this->collection = $collection;
        $this->per_page = $per_page;
        $this->total_item = $collection->count();
        $this->total_page = ceil($this->total_item / $this->per_page);
    }

    public function getItem($page)
    {
        return $this->collection->forPage($page, $this->per_page);
    }

}