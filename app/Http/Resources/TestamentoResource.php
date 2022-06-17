<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TestamentoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'livros' => new LivrosCollection($this->whenLoaded('livros')),
            'links' => [
                [
                    'rel' => 'Alterar um testamento',
                    'type' => 'PUT',
                    'link' => route('testamento.update', $this->id)
                ],
                [
                    'rel' => 'Excluir um testamento',
                    'type' => 'DELETE',
                    'link' => route('testamento.destroy', $this->id)
                ]
            ]
        ];
    }
}
