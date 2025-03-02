<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class TodoList1 extends Component
{
    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public $name;

    public function create(){

   $validate=$this->validateOnly('name');
   Todo::create($validate);
   $this->reset('name');
   session()->flash('success','createdd'); 

   $this->resetPage();


    }
    public function render()
    {
        return view('livewire.toplist',[
            'todos' => Todo::latest()->where('name','like',"%{$this->search}%")->paginate(5)
        ]);
    }
}
