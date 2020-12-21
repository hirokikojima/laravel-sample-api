<?php

namespace App\Repositories;

use App\Models\Sample;

class SampleRepository
{
    public function find(int $id): Sample
    {
        return Sample::find($id);
    }
}