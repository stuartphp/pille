<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Permission;

class Permissions extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refresh' => '$refresh'];
    public $sortBy = 'title';
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
            ->when($this->searchTerm, function($q){
            $q->where('title', 'like', '%'.$this->searchTerm.'%');
        })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->pageSize);
        return view('livewire.admin.users.permissions', ['data'=>$data]);
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
        return Permission::query();
    }
}
