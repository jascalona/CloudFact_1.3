<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\parks;

class AutoComplete extends Component
{

    public $producto_id;
    public $model;
    public $rif;
    public $n_contract;

    public $productos;

    public function mount($value)
    {
        $this->productos = parks::all();
    }
    // Se ejecuta cada vez que cambia producto_id
    public function updatedProductoId($value)
    {
        if (!empty($value)) {
            $equipo = parks::with('serial')->find($value);

            if ($equipo) {
                $this->model = $equipo->model;
                //$this->contrato = $equipo->categoria->nombre;
                $this->rif = $equipo->rif;
                $this->cliente = $equipo->cliente;
            }
        } else {
            $this->reset(['model', 'serial', 'model', 'cliente']);
        }
    }



    public function render()
    {
        return view('livewire.auto-complete');
    }
}
