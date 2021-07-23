<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserProfile extends Component
{
    public $item;

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

    public function mount()
    {
        $this->item = User::findOrFail(auth()->id());
    }

    public function saveForm()
    {
        $this->validate();
        if($this->item['password'])
        {
            $this->item['password']= bcrypt($this->item['password']);
        }else{
            unset($this->item['password']);
        }
        $this->item->save();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Updated']);
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
