<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Role;

class Roles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refresh' => '$refresh'];
    public $sortBy = 'name';
    public $searchTerm='';
    public $sortAsc = true;
    public $pageSize = 15;

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function updatedPageSize()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data= $this->query()
            ->with(['permissions'])
            ->when($this->searchTerm, function($q){
                $q->where('title', 'like', '%'.$this->searchTerm.'%');
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->pageSize);

        return view('livewire.admin.users.roles', ['data'=>$data]);
    }

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function query()
    {
        return Role::query();
    }
}
