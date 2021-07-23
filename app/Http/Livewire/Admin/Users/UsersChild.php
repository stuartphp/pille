<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UsersChild extends Component
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
    public $parent = 'admin.users.users';

    protected $rules = [
        'item.name'  => 'required',
        'item.email' => 'required|email',
        'item.password'=>'',
        'item.mobile_number' => 'required|numeric',
        'item.date_of_birth'=>'date',
        'item.delivery_address'=>'required',
        'item.id_number'=>'',
        'item.gender'=>'boolean'
    ];

    protected $validationAttributes = [
        'item.name'  => 'Name',
        'item.email' => 'Email',
        'item.password'=>'Password',
        'item.mobile_number' => 'Mobile Number',
        'item.date_of_birth'=>'Date Of Birth',
        'item.delivery_address'=>'Delivery Address',
        'item.id_number'=>'ID Number',
        'item.gender'=>'Gender'
    ];

    public function render()
    {
        return view('livewire.admin.users.users-child');
    }
    public function showDeleteForm($id)
    {
        $this->primaryKey = $id;
        $this->dispatchBrowserEvent('modal', ['modal'=>'deleteForm', 'action'=>'show']);
    }

    public function deleteItem()
    {
        User::destroy($this->primaryKey);
        $this->dispatchBrowserEvent('modal', ['modal'=>'deleteForm', 'action'=>'hide']);
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Deleted']);
        $this->emitTo($this->parent, 'refresh');
    }

    public function showEditForm(User $item)
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
        User::create([
            'group' => $this->item['group'],
            'title' => $this->item['title']
        ]);
        $this->dispatchBrowserEvent('modal', ['modal'=>'createForm', 'action'=>'hide']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Created']);
        $this->emitTo($this->parent, 'refresh');
    }
}
