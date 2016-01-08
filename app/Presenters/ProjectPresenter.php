<?php

namespace ProjectRico\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use ProjectRico\Transformers\ProjectTransformer;

class ProjectPresenter extends FractalPresenter
{
    public function getTransformer()
    {        
        return new ProjectTransformer();        
    }

}
