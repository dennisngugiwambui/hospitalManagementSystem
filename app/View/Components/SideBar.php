<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class SideBar extends Component
{
    public $name;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
       $user =  User::where('id', Auth::user()->id)->first();
       $this->name = $user->name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.side-bar', [
            'name'=>$this->name,
        ]);
    }
}
