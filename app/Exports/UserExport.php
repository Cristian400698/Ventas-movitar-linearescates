<?php

namespace App\Exports;


use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users =DB::table('users')
        ->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
        ->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')  
        ->select( 'users.id','users.name as Nombre_user','users.email','users.cedula','users.email_verified_at','users.password','users.two_factor_secret','users.two_factor_recovery_codes','users.remember_token','users.username','users.created_at','users.updated_at','roles.name')
        ->orderBy('users.id', 'asc')
        ->get(); 
        return $users;
    }
    public function headings(): array
    {
        return [
            'id',
            'Nombre',
            'Correo',
            'Cedula',
            'email_verified_at',
            'password',
            'two_factor_secret',
            'two_factor_recovery_codes',
            'remember_token',
            'Nombre de usuario',
            'created_at',
            'updated_at',
            'Roles',


        ];
    }
}
