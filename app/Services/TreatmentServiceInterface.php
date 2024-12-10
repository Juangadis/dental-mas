<?php
namespace App\Services;

use App\Models\Treatment;

interface TreatmentServiceInterface
{
    public function createTreatment(array $data): Treatment;
}