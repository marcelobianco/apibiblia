<?php

namespace App\Http\Controllers;

use App\Http\Resources\LivroResource;
use App\Http\Resources\LivrosCollection;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LivrosCollection(Livro::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Livro::create($request->all())) {
            return response()->json([
                'message' => ' Livro Cadastrado com sucesso.'
            ], 201);
        }
         
        return response()->json([
            'message' => ' Erro ao cadastrar o livro.'
        ], 404); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function show($livro)
    {   
        $livro = Livro::with('testamento', 'versiculos', 'versao')->find($livro);
        //dd(Storage::disk('public')->url($livro->capa));
        if ($livro) {
            
            return new LivroResource($livro);
        }

        return response()->json([
            'message' => ' Erro ao pesquisar o livro.'
        ], 404);
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $livro)
    {
        $path = $request->capa->store('capa_livro', 'public');

        $livro = Livro::find($livro);
        if ($livro) {
            $livro->capa = $path;

            if ($livro->save()) {
                return $livro;
            }

            return response()->json([
                'message' => ' Erro ao atualizar o livro.'
            ], 404);
        }

        return response()->json([
            'message' => ' Erro ao atualizar o livro.'
        ], 404);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy($livro)
    {
        if (Livro::destroy($livro)) {
            return response()->json([
                'message' => ' Livro deletado com sucesso.'
            ], 201);
        }
        
        return response()->json([
            'message' => ' Erro ao deletar o livro.'
        ], 404);
    }
}
