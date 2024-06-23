<?php

namespace App\Enums;
//['doctor', 'patient', 'nurse', 'pharmacy', 'admin']

enum Roles: string
{
    case DOCTOR = 'doctor';
    case PATIENT = 'patient';
    case NURSE = 'nurse';
    case PHARMACY = 'pharmacy';
    case ADMIN = 'admin';
}
