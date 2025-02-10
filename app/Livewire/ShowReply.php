<?php

namespace App\Livewire;

use App\Models\Reply;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ShowReply extends Component
{
    //PROPIEDADES
    use AuthorizesRequests;
    public Reply $reply;
    public $body = '';
    public $is_creating = false;
    public $is_editing = false;

    //EVENTO
    protected $listeners = ['refresh' => '$refresh'];
    //guardar texto de editar
    //METODS QUE SE ACTIVARAN

    //EDITAR
    public function updatedIsCreating()
    {
        $this->is_editing = false;
        $this->body = '';
    }


    //guradar texto de editar
    public function updatedIsEditing()
    {
        $this->authorize('update', $this->reply);

        $this->is_creating = false;
        $this->body = $this->reply->body;
    }

    //ACTUALIZACION
    public function updateReply()
    {
        //autenticar que solo el usuario logueado pueda editar su respuesta
        $this->authorize('update', $this->reply);
        //validar
        $this->validate(['body' => 'required']);
        //editar
        $this->reply->update([
            'body' => $this->body
        ]);
        //refrescar
        $this->is_editing = false;
    }

    //METODO CREACIÒN DE PREGUNTA
    public function postChild()
    {
        if (!is_null($this->reply->reply_id)) return;

        // dd($this->body);
        //validar
        $this->validate(['body' => 'required']);
        //crear
        auth()->user()->replies()->create([
            'reply_id' => $this->reply->id,
            'thread_id' => $this->reply->thread->id,
            'body' => $this->body
        ]);
        //refrescar
        $this->is_creating = false;
        $this->body = '';
        $this->dispatch('refresh')->self();
    }

    //METODO IMPRESIÒN DE LA VISTA
    public function render()
    {
        return view('livewire.show-reply');
    }
}
