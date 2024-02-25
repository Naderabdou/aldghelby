<?php

        namespace App\Repositories\Sql;
        use App\Models\Blog;
        use App\Repositories\Contract\BlogRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class BlogRepository extends BaseRepository implements BlogRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Blog();

            }

        }
        