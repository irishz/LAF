<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('users')->join('form', 'users.user_id', '=', 'form.user_id')
            ->select('users.prename','users.f_name','users.l_name','users.position','users.department','users.section','users.email','form.*')
            ->orderBy('form.created_at','desc')->get();
    }

    public function headings(): array
    {
        return [
            'Prename',
            'First Name',
            'Last Name',
            'Position',
            'Department',
            'Section',
            'Email',
            'Form ID',
            'User ID',
            'Leave Type',
            'Leave Cause',
            'Number Date Leave',
            'Hour Date Leave',
            'Date Leave',
            'Commented',
            'Approved',
            'Approve By',
            'Responsible Work',
            'Attatchment',
            'Approve DateTime',
            'Create At'
        ];
    }
}
