<?php

namespace ProjectRico\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use ProjectRico\Transformers\ProjectMemberTransformer;

class ProjectMemberPresenter extends FractalPresenter{    
    
    public function getTransformer() 
    {
        return new ProjectMemberTransformer();
    }

}
