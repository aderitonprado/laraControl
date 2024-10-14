<?php

namespace App\Http\Controllers;

use App\Models\ThirdParty;
use Illuminate\Http\Request;

class ThirdPartyControllerApi extends Controller
{
    public $status = null;
    public $description;
    public $start_date = null;
    public $end_date = null;
    public $take;
    public function index()
    {
        $array = ['error' => ''];
        // Retorna todos os terceiros por ordem de ID Desc
        $thirdparties = ThirdParty::orderBy('id', 'DESC');

        /**
         * Retorna os terceiros respeitando a data de inicio do cadastro
         */
        $thirdparties->when($this->description, function ($queryBuilder) {
            return $queryBuilder->where('description', 'LIKE', '%' . $this->description . '%');
        });

        /**
         * Retorna os terceiros respeitando a data de inicio do cadastro
         */
        $thirdparties->when($this->start_date, function ($queryBuilder) {
            return $queryBuilder->where('created_at', '>=', $this->start_date);
        });

        /**
         * Retorna os terceiros respeitando a data final do cadastro
         */
        $thirdparties->when($this->end_date, function ($queryBuilder) {
            return $queryBuilder->where('created_at', '<=', $this->end_date);
        });

        /**
         * Retorna os terceiros por status: Ativo / Inativo / Todos
         */
        $thirdparties->when($this->status, function ($queryBuilder) {

            $sts = '';

            if ($this->status != 'A' && $this->status != 'I') {
                $sts = '';
            }

            $this->status == 'A' ? $sts = 1 : $sts = 0;

            return $queryBuilder->where('status', '=', $sts);
        });

        return $array['data'] = $this->take ? $thirdparties->paginate($this->take) : $thirdparties->paginate(15);
    }

    public function show()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'url' => 'required',
            'icon' => 'required',
        ]);
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
