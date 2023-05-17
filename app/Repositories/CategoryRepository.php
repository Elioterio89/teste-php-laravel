<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Document;
use Exception;

class CategoryRepository
{
   
    public function getCategoryByName(string $name): Category | null
    {
        try {
            return Category::where('name',$name)->first();
        } catch (\Throwable $exception) {
            throw new Exception('error generico ao tentar recuperar registro');
        }

    }
}
