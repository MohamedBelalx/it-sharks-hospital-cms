<?php

namespace App\Repository;

use App\DTO\VisitDTO;
use App\Repository\Interface\IVisitRepository;
use App\Models\Visit;

class VisitRepository implements IVisitRepository
{
    public function create(VisitDTO $visit)
    {
        return Visit::create($visit->toArray());
    }
    public function getAll()
    {
        return Visit::select('visits.id','visits.time', 'doctors.name as doctor', 'patients.name as patient',
                            'nurses.name as nurse')
                            ->join('users as doctors', 'doctors.id', '=', 'visits.doctor_id')
                            ->join('users as nurses', 'nurses.id', '=', 'visits.nurse_id')
                            ->join('users as patients', 'patients.id', '=', 'visits.patient_id')->get();
    }

    public function getById(string $id)
    {
        return Visit::findOrFail($id);
    }
    public function update(VisitDTO $visit, string $id)
    {
        return Visit::where('id', $id)->update($visit->toArray());
    }
    public function delete(string $id)
    {
        return Visit::where('id', $id)->delete();
    }
}
/*
SELECT time, doctors.name as doctor , patients.name as patient,nurses.name as nurse FROM visits 
JOIN users as doctors ON doctors.id = visits.doctor_id
JOIN users as nurses ON nurses.id = visits.nurse_id
JOIN users as patients ON patients.id = visits.patient_id;
*/