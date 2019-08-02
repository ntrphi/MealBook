<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Auth;

class HeaderComposer
{
   
    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param    View  $view
     * @return  void
     */
    public function compose(View $view)
    {
        $user = Auth::user();
        $view->with(['user'=>$user]);
    }
}