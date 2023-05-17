<?php

namespace App\Services;

use App\Jobs\ProcessDocumentsUploads;
use App\Repositories\CategoryRepository;
use Illuminate\Http\UploadedFile;

class DocumentService
{

    private CategoryRepository $categoryRepository;


    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }
    public function uploadFileStoragePath(UploadedFile $file): void
    {

        $jsonData = file_get_contents($file->path());

        $documents = json_decode($jsonData, true);
        foreach ($documents['documentos'] as  $document) {

            $category =  $this->categoryRepository->getCategoryByName($document['categoria']);
            $documento = [];
            $documento['contents'] = $document['conteúdo'];
            $documento['category_id'] = $category->id;
            $documento['title'] = $document['titulo'];
            $documento['ano_exercicio'] = $documents['exercicio'];

            ProcessDocumentsUploads::dispatch($documento)->onQueue('documents');
        }
    }
}
