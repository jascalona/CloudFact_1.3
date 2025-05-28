<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\User;

/**rutas de permisologia y roles */
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class PerfilController extends Controller
{
    /**Index bvista principal Perfil de Usuarios */
    public function index(){

        $users = user::orderBy('created_at', 'desc')
        ->paginate(7) ;

        return view('layouts.Perfil', compact('users'));
    }

    /**function for update informations */
    
    public function updateInfoPer(Request $request, $id){
        if (!empty($_POST['actu_info_per'])) {

            /**MODIFICACION DE DATOS PERSONALES */
            $user = Users::findOrFail($id);
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->cargo = $request->cargo;
            $user->dpt = $request->dpt;
            $user->location = $request->location;
            $user->n_extension = $request->n_extension;
            $user->phone = $request->phone;
            $user->about = $request->about;
            
            $user->save();

            return redirect()->back()->with('success', 'Su Información personal ha sido actualizada!');

        } else{
            return redirect()->back()->with('alert_message', 'Lo sentimos, ha ocurrido un error al actualizar sus datos!');
        }

    }
    
    /**PANEL ADMINISTRADOR DE USUARIOS */
    public function userManagerIndex(){

        $users = users::all();

        return view('screens.user_manager', compact('users'));
    }


    /**CONTROLADOR PARA CREAR USUARIO */
    public function showNewUser(){

        /**ROLES Y PERMISOS */
        $roles = role::all();

        $permisos = Permission::all(); 


        return view('screens.new_user', compact('roles', 'permisos'));

        

    }

}
