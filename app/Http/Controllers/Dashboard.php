<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class Dashboard extends Controller
{

    public function __construct()
    {
        
    }

    public function index()
    {
        if (!Session()->get('id_user')) {
            return redirect()->route('login');
        }

        $role = Session()->get('role');
        $user = User::find(Session()->get('id_user'));

        if ($role === 'Admin') {
            $view = 'admin.dashboard';

            $data = [
                'title'         => 'Dashboard',
                'user'          => $user
            ];
        } else if ($role === 'QC') {
            $view = 'qc.dashboard';

            $data = [
                'title'         => 'Dashboard',
                'user'          => $user
            ];
        } else if ($role === 'Maintenance') {
            $view = 'maintenance.dashboard';

            $data = [
                'title'         => 'Dashboard',
                'user'          => $user
            ];
        }

        return view($view, $data);
    }
}
