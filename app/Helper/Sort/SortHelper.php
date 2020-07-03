<?php
namespace App\Helper\Sort;

class SortHelper
{
    public static function sort($collection, $sort_by, $sort_type)
    {
        if ($sort_type == 'desc') {
            $result = $collection->sortByDesc($sort_by);
        } else {
            $result = $collection->sortBy($sort_by);
        }
        return $result;
    }
}