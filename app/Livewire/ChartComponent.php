<?php

namespace App\Livewire;

use App\Models\Reply;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChartComponent extends Component
{
    public $data= [];

    public function mount()
    {
        $this->data = Reply::query()
        ->join('threads', 'threads.id', '=', 'replies.thread_id')
        ->select('threads.title as pregunta', DB::raw('COUNT(replies.id) as respuestas'))
        ->groupBy('replies.id')
        ->orderBy('respuestas', 'desc')
        ->get()->toArray();

    }

    public function render()
    {
        return view('livewire.chart-component');
    }
}
