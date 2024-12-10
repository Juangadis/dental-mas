<?php
namespace App\Repositories;

use App\Models\Treatment;

interface TreatmentRepositoryInterface
{
    public function create(array $data): Treatment;
}
