<?php


namespace App\MyStorage;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Paginator
{
    public static function paginate($items, $basePath = null, $perPage = 24, $page = null, $options = [])
    {
        $page = $page ?: (\Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        $paginator = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

        if (is_array($basePath)) {
            $paginator->appends($basePath);
        } else {
            $paginator->withPath($basePath);
        }
        return $paginator;
    }

}
