<?php

namespace App\Http\Controllers;

use App\Services\DocumentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;

class DocumentController extends Controller
{
    private DocumentService $documentService;

    public function __construct()
    {
        $this->documentService = new DocumentService();
    }
    public function index()
    {
        return view('document-upload');
    }
    public function uploadFile(Request $request)
    {
        $file = $this->validate($request, [
            'file' => 'required',
        ]);

        $this->documentService->uploadFileStoragePath($file['file']);
        echo 'Documentos enviados para processamento com sucesso';
        return view('document-process-queue');

    }

    public function dispatchDocumentQueue(Request $request)
    {
        
        $exitCode = Artisan::call('queue:work --stop-when-empty --queue=documents ', []);
        if ($exitCode == 0) {
            echo response('Fila Executada');
            return view('document-upload');
        } else {
            return response('Erroao executar a fila');
        }
    }
}
