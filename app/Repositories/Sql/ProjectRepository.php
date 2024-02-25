<?php

        namespace App\Repositories\Sql;
        use App\Models\Project;
        use App\Repositories\Contract\ProjectRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Project();

            }

        }
        