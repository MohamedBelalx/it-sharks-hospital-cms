<?php

namespace App\Repository;

use App\DTO\NurseSurgeryDTO;
use App\DTO\SurgeryDTO;
use App\Models\Nurse_Surgery;
use App\Models\Surgery;
use App\Repository\Interface\ISurgeryRepository;

class SurgeryRepository implements ISurgeryRepository
{
    public function create(SurgeryDTO $surgery,NurseSurgeryDTO $nurseSurgeryDTO)
    {
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
        return Surgery::findOrFail($id);
    }

    public function getNurseBySurgery(string $id)
    {
        return Nurse_Surgery::where('surgery_id',$id)->get('nurse_surgery.nurse_id');
    }

    public function update(SurgeryDTO $surgery, NurseSurgeryDTO $nurseSurgeryDTO, string $id)
    {
        Surgery::find($id)->update($surgery->toArray());
        Nurse_Surgery::where('surgery_id',$id)->delete();
        Nurse_Surgery::create($nurseSurgeryDTO->toArray()+['surgery_id'=>$id]);
        return true;
    }

    public function delete(string $id)
    {
        Nurse_Surgery::where('surgery_id',$id)->delete();
        Surgery::find($id)->delete();
        return true;
    }


}
