<?php

namespace App\Support;

class Qualification
{
    public static function fullName(?string $qualification): string
    {
        $qualification = trim($qualification ?? '');
        $key = strtolower(preg_replace('/[.\s]+/', '', $qualification));

        return match ($key) {
            'bsc' => 'Bachelor of Science',
            'msc' => 'Master of Science',
            'ba' => 'Bachelor of Arts',
            'ma' => 'Master of Arts',
            'bed' => 'Bachelor of Education',
            'med' => 'Master of Education',
            'bba' => 'Bachelor of Business Administration',
            'mba' => 'Master of Business Administration',
            'beng' => 'Bachelor of Engineering',
            'meng' => 'Master of Engineering',
            'bcom' => 'Bachelor of Commerce',
            'mcom' => 'Master of Commerce',
            'llb' => 'Bachelor of Laws',
            'llm' => 'Master of Laws',
            'phd' => 'Doctor of Philosophy',
            'edd' => 'Doctor of Education',
            'pgdip' => 'Postgraduate Diploma',
            'pgcert' => 'Postgraduate Certificate',
            default => $qualification,
        };
    }
}
