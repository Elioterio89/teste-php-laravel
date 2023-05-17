<?php

namespace App\Jobs;

use App\Repositories\DocumentRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessDocumentsUploads implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private DocumentRepository $documentRepository;

    private array $document;
   
    public function __construct(array $document)
    {
        $this->document = $document;

    }

    public function handle(): void
    {       
        try {
            (new DocumentRepository())->save($this->document);
        } catch (\Throwable $th) {
           throw $th;
        }
    }
}
