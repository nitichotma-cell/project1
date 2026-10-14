<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
class Addusertable extends Component
{
    public $name;
    public $email;
    public $password;

    public function adduser()
    {
        
      User::create([
        'name' => $this->name,
        'email' => $this->email,
        'password' => bcrypt($this->password),
      ]);
      return redirect()->route('users')->with('success', 'User added successfully.');
    }

    public function render()
    {
        return view('livewire.addusertable');
    }
}
