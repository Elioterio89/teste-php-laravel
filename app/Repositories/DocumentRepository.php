<?php

namespace App\Repositories;

use App\Models\Document;
use Exception;

class DocumentRepository
{
   
    public function save(array $document): void
    {
        try { 
            Document::create([
                'contents' => $document['contents'],
                'category_id' => $document['category_id'],
                'title' => $document['title'],
                'ano_exercicio' => $document['ano_exercicio']
            ]);      
        } catch (\Throwable $exception) {
            throw new Exception($exception->getMessage());
        }

    }
}
