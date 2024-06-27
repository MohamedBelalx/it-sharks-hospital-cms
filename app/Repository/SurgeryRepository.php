<?php

namespace App\Repository;

use App\DTO\NurseSurgeryDTO;
use App\DTO\SurgeryDTO;
use App\Models\Nurse_Surgery;
use App\Models\Surgery;
use App\Models\Visit;
use App\Repository\Interface\ISurgeryRepository;

class SurgeryRepository implements ISurgeryRepository
{
    public function create(SurgeryDTO $surgery,NurseSurgeryDTO $nurseSurgeryDTO)
    {
        // dd($nurseSurgeryDTO);
        Surgery::create($surgery->toArray());
        $surgeryId = Surgery::latest()->first()->id;
        Nurse_Surgery::create($nurseSurgeryDTO->toArray()+['surgery_id'=>$surgeryId]);
        return true;
    }
    public function getAll()
    {
        return Surgery::select('surgery.*', 'doctors.name as doctor', 'nurses.name as nurse')
            ->join('nurse_surgery', 'nurse_surgery.surgery_id', '=', 'surgery.id')
            ->join('users as doctors', 'doctors.id', '=', 'surgery.doctor_id')
            ->join('users as nurses', 'nurses.id', '=', 'nurse_surgery.nurse_id')->get();
    }

    public function getById($id)
    {
        return Surgery::find($id);
    }

    public function update(SurgeryDTO $surgery, string $id)
    {
        return Surgery::find($id)->update($surgery->toArray());
    }

    public function delete(string $id)
    {
        return Surgery::find($id)->delete();
    }

}
