<?php

namespace App\Http\Controllers;

use App\Http\Resources\IdiomaResource;
use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Idioma::all();
        return IdiomaResource::collection(Idioma::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Idioma::create($request->all())) {
            return response()->json([
                'message' => 'Idioma cadastrado com sucesso,'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar o idioma'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idioma)
    {
        $idioma = Idioma::find($idioma);
        if ($idioma) {
            $idioma->versoes;
            return $idioma;
        }

        return response()->json([
            'message' => 'Erro ao pesquisar o idioma'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idioma)
    {
        $idioma = Idioma::find($idioma);
        if ($idioma) {
            $idioma->update($request->all());

            return $idioma;
        }

        return response()->json([
            'message' => 'Erro ao atualizar o idioma'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idioma)
    {
        if (Idioma::destroy($idioma)) {
            return response()->json([
                'message' => ' Idioma deletado com sucesso.'
            ], 201);
        }
        
        return response()->json([
            'message' => ' Erro ao deletar o Idioma.'
        ], 404);
    }
}
