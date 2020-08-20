<?php
namespace App\Helper\Search;

class SearchHelper
{
    public static function search($model, $search_field = [], $keyword)
    {
        $result = $model::where('id', '=', intval($keyword));
        $i = 0;
        while ($i < count($search_field)) {
            $result = $result->orwhere($search_field[$i], 'like', "%" . $keyword . "%");
            $i++;
        }
        return $result->get();
    }
}