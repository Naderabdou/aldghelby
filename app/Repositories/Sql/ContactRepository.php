<?php

        namespace App\Repositories\Sql;
        use App\Models\Contact;
        use App\Repositories\Contract\ContactRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class ContactRepository extends BaseRepository implements ContactRepositoryInterface
        {
            
            public function __construct()
            {

                return $this->model = new Contact();

            }

        }
        