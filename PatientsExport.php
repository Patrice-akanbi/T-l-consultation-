<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Patient::with('utilisateur')->get();
    }

    public function headings(): array
    {
        return ['Nom', 'Prénom', 'Téléphone', 'Âge', 'Village', 'Sexe'];
    }

    public function map($patient): array
    {
        return [
            $patient->utilisateur->nom,
            $patient->utilisateur->prenom,
            $patient->utilisateur->telephone,
            $patient->age,
            $patient->village,
            $patient->sexe,
        ];
    }
}