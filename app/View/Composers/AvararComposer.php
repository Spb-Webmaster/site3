<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class AvararComposer
{
    public function compose(View $view): void
    {


        if (isset(auth()->user()->userProfile->avatar)) {
            $user_32_avatar = '/storage/images/avatars/' . auth()->user()->id . '/origin/32/' . auth()->user()->userProfile->avatar;
        } else {
            $user_32_avatar = '/storage/images/user.svg';
        }


        $view->with('user_32_avatar', $user_32_avatar);

    }
}
