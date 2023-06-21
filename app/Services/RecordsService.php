<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RecordsService {

    public function handleUploadRecording($recording): string | null
    {
        if (isset($recording)) {
            return request()->narrative_file->store('recording', 'public');
        }
    }
}
