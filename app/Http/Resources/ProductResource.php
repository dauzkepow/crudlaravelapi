<?php
// membuat data dari Model Product ke dalam format JSON sesuai kebutuhan


namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    // define properti, simpan status, pesan, data yang dikirim respon JSON
    public $status;
    public $message;
    public $resource;

    // inisialisasi nilai properti dari controller
    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

    public function toArray(Request $request): array
    {
        // mengembalikan format JSON
        return [
            'success' => $this->status,
            'message' => $this->message,
            'data' => $this->resource
        ];
    }
}
