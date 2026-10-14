<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
class Editusertable extends Component
{
    public $idd, $name, $email,$password;

    public function updateUser()
    {
       user::where('id', $this->idd)->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
        return redirect()->to(route('users'));
    

        $user = User::find($this->idd);
        $user->name = $this->name;
        $user->email = $this->email;

        if (!empty($this->password)) {
            $user->password = bcrypt($this->password);
        }

        $user->save();

        session()->flash('message', 'User updated successfully.');
    }

    public function mount(int $id)
    {
        $user = user::find($id);
        $this->idd = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
    }
    public function render()
    { 
        return view('livewire.editusertable');
    }
}
