<?php

namespace ProjectRico\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

interface ProjectRepository extends RepositoryInterface
{
    public function isOwner($projectId, $userId);
    public function hasMember($projectId, $memberId);
}

