<?php
namespace App\Repositories;

use App\Models\Treatment;

class TreatmentRepository implements TreatmentRepositoryInterface
{
    public function create(array $data): Treatment
    {
        return Treatment::create($data);
    }
}