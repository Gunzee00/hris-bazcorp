<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection, WithHeadings
{
    /**
     * Ambil koleksi data karyawan untuk diekspor.
     */
    public function collection()
    {
        return Employee::all();
    }

    /**
     * Tambahkan header di file Excel
     */
    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'Employee No',
            'Access Card ID',
            'First Name',
            'Last Name',
            'Nickname',
            'ID Card',
            'Birth Place',
            'Birth Date',
            'Gender',
            'Marital Status',
            'Religion',
            'Height',
            'Weight',
            'Blood Type',
            'ID Card Address',
            'Address',
            'KTA',
            'Phone Number',
            'Email',
            'Social Media',
            'Clothes Size',
            'Trouser Size',
            'Shoes Size',
            'Language',
            'Educational Level',
            'Major',
            'Skill',
            'Emergency Contact Name',
            'Emergency Contact Number',
            'Position ID',
            'Agreement Type',
            'Join Date',
            'Certificate',
            'Created At',
            'Updated At'
        ];
    }
}
