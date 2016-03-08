<?php

namespace ProjectRico\Transformers;

use ProjectRico\Entities\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract{
    
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            //'password' => $data->password,
            'remember_token' => $user->remember_token,
        ];
    }
}
