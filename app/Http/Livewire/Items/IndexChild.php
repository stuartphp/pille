<?php

namespace App\Http\Livewire\Items;

use Livewire\Component;
use App\Models\Item;

class IndexChild extends Component
{
    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];
    public $confirmingItemDeletion = false;
    public $confirmingItemCreation = false;
    public $confirmingItemEdition = false;
    public $primaryKey;
    public $item;
    public $message ='';
    public $parent = 'items.index';

    public function render()
    {
        return view('livewire.items.index-child');
    }
    public function showDeleteForm($id)
    {
        $this->primaryKey = $id;
        $this->dispatchBrowserEvent('modal', ['modal'=>'deleteForm', 'action'=>'show']);
    }

    public function deleteItem()
    {
        Item::destroy($this->primaryKey);
        $this->dispatchBrowserEvent('modal', ['modal'=>'deleteForm', 'action'=>'hide']);
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Deleted']);
        $this->emitTo($this->parent, 'refresh');
    }

    public function showEditForm(Item $item)
    {
        $this->resetErrorBag();
        $this->item = $item->toArray();
        $this->dispatchBrowserEvent('modal', ['modal'=>'editForm', 'action'=>'show']);
    }

    public function editItem()
    {
        $this->validate();
        if($this->item['password'])
        {
            $this->item['password']= bcrypt($this->item['password']);
        }else{
            unset($this->item['password']);
        }
        $this->item->save();
        $this->dispatchBrowserEvent('modal', ['modal'=>'editForm', 'action'=>'hide']);
        $this->primaryKey = '';
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Updated']);
        $this->emitTo($this->parent, 'refresh');
    }

    public function showCreateForm()
    {
        $this->resetErrorBag();
        $this->reset(['item']);
        $this->dispatchBrowserEvent('modal', ['modal'=>'createForm', 'action'=>'show']);
    }

    public function createItem()
    {
        $this->validate();
        Item::create([
            'group' => $this->item['group'],
            'title' => $this->item['title']
        ]);
        $this->dispatchBrowserEvent('modal', ['modal'=>'createForm', 'action'=>'hide']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Created']);
        $this->emitTo($this->parent, 'refresh');
    }
}
