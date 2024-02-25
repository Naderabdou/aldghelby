<?php

        namespace App\Repositories\Sql;
        use App\Models\User;
        use App\Repositories\Contract\UserRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class UserRepository extends BaseRepository implements UserRepositoryInterface
        {
            
            public function __construct()
            {

                return $this->model = new User();

            }

        }
        