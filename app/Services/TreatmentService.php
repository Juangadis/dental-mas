<?php
namespace App\Services;

use App\Repositories\TreatmentRepositoryInterface;
use App\Models\Treatment;

class TreatmentService implements TreatmentServiceInterface
{
    protected $treatmentRepository;

    public function __construct(TreatmentRepositoryInterface $treatmentRepository)
    {
        $this->treatmentRepository = $treatmentRepository;
    }

    public function createTreatment(array $data): Treatment
    {
        return $this->treatmentRepository->create($data);
    }
}