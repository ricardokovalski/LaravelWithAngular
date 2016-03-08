<?php

namespace ProjectRico\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use ProjectRico\Transformers\UserTransformer;

class UserPresenter extends FractalPresenter{    
    
    public function getTransformer() 
    {
        return new UserTransformer();
    }

}
