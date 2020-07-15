<?php

namespace App\Repositories\ProductRepositories;

use App\Models\ProductReview;
use App\Repositories\BaseRepository;

/**
 * Class ProductRviewsRepository
 */
class ProductRviewsRepository extends BaseRepository
{

    public function __construct()
    {
        $this->setModel();
    }

    public function getModel()
    {
        return ProductReview::class;
    }

}