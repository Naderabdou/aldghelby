<?php

namespace App\Repositories\Sql;

use App\Repositories\Contract\BaseRepositoryInterface;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Collection;

abstract class BaseRepository implements BaseRepositoryInterface
{


    protected $model;

    // public function __construct()
    // {
    //     $this->setModel();
    // }

    // /**
    //  * get model
    //  * @return string
    //  */
    // abstract public function getModel();

    // /**
    //  * Create a model instance for this repository
    //  */
    // public function setModel()
    // {
    //     $this->model = app()->make(
    //         $this->getModel()
    //     );
    // }

    /**
     * insert new model to database
     * @params $data => array of columns names and its values
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * insert more than 1 model to database
     * @params $data => array of columns names and its values
     */
    public function CreateMulti(array $data)
    {
        return $this->model->insert($data);
    }


    /**
     * updating a model in the database
     * @params $id => row id && $data => array of columns names and its values
     *
     */
    public function update(array $data, $id)
    {

        $this->model->where('id', $id)->update($data);
        return $this->model->where('id', $id)->first();
    }

    public function updateWhere(array $data, array $data2)
    {
        return $this->model->where($data2)->update($data);
    }

    public function getCloserAddress($lat, $lng)
    {

        return $this->model->select(DB::raw('*, ( 6367 * acos( cos( radians(' . $lat . ') ) * cos( radians( lat ) )
        * cos( radians( lng ) - radians(' . $lng . ') ) + sin( radians(' . $lat . '))
        * sin( radians( lat ) ) ) ) AS distance'))
            ->orderBy('distance', 'asc')
            ->first();
    }

    /**
     * retrieve all the row for the given model
     * @params OPTIONAL $orderBy with the column name && dir
     */
    public function getAll($orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->orderBy($orderBy['column'], $orderBy['dir'])->get();
    }

    /**
     * retrieve all the row for the given model with a conditional relation
     * @params OPTIONAL $orderBy with the column name && dir
     */
    public function whereHas($relation, array $data, array $data2 = [], $orderBy = ['column' => 'id', 'dir' => 'Asc'])
    {
        return $this->model->whereHas($relation, function ($q) use ($data) {
            $q->where($data);
        })->where($data2)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    }

    /**
     * retrieve all the row for the given model with a conditional relation
     * @params OPTIONAL $orderBy with the column name && dir
     */
    public function whereHasAndWhereIn($column, array $value, $orderBy = ['column' => 'id', 'dir' => 'Asc'])
    {
        return $this->model->whereIn($column, $value)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    }

    /**
     * retrieve all the row for the given model with a conditional relation
     * @params OPTIONAL $orderBy with the column name && dir
     */
    public function whereHasOrderBy($relation, $d, $a, array $data2 = [])
    {
        return $this->model->whereHas($relation, function ($q) use ($d, $a) {
            $q->orderBy($d, $a);
        })->with($relation)->get();
    }

    /**
     * paginate all the row for the given model with a conditional relation
     * @params OPTIONAL $orderBy with the column name && dir
     * @params OPTIONAL $limit with the column name && dir
     */
    public function paginateWhereHas($relation, array $data, $limit = 10, array $data2 = [], $orderBy = ['column' => 'id', 'dir' => 'Asc'])
    {
        return $this->model->whereHas($relation, function ($q) use ($data) {
            $q->where($data);
        })->where($data2)->orderBy($orderBy['column'], $orderBy['dir'])->paginate($limit);
    }

    /**
     * retrieve all the row for the given model with relation and a conditional relation
     * @params OPTIONAL $orderBy with the column name && dir
     */
    public function whereHasWith(array $with, $relation, array $data, array $data2 = [], $orderBy = ['column' => 'id', 'dir' => 'Asc'])
    {
        return $this->model->with($with)->whereHas($relation, function ($q) use ($data) {
            $q->where($data);
        })->where($data2)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    }

    public function whereHasWithFirst(array $with, $relation, array $data, array $data2 = [], $orderBy = ['column' => 'id', 'dir' => 'Asc'])
    {
        return $this->model->with($with)->whereHas($relation, function ($q) use ($data) {
            $q->where($data);
        })->where($data2)->orderBy($orderBy['column'], $orderBy['dir'])->first();
    }

    /**
     * retrieve all the row for the given model with relation and a conditional relation length
     * @params OPTIONAL $orderBy with the column name && dir, $data2
     */
    public function hasCount($relation, $operation, $condition, array $with, array $data2 = [], $orderBy = ['column' => 'id', 'dir' => 'Asc'])
    {
        // Contract::has('invoices', '>', 0)->with(['unit', 'renter', 'estate', 'invoices', 'estate.owner'])->where('estate_manager_id', auth()->user()->id)->get();

        return $this->model->has($relation, $operation, $condition)->with($with)->where($data2)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    }

    /**
     * retrieve all the TRASHED row for the given model
     * @params OPTIONAL $orderBy with the column name && dir
     */
    public function getAllTrashed($orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->onlyTrashed()->orderBy($orderBy['column'], $orderBy['dir'])->get();
    }

    /**
     * restore all the TRASHED row for the given model
     */
    public function restoreAllTrashed()
    {
        return $this->model->withTrashed()->restore();
    }


    /**
     * retrieve all the rows matching the where condition
     * @params OPTIONAL $orderBy with the column name && dir
     */
    public function getWhere($data, $orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->where($data)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    }

    /**
     * retrieve all the rows matching the where condition
     * @params OPTIONAL $orderBy with the column name && dir
     */
    public function getOrWhere($data, $data2, $orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->where($data)->orwhere($data2)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    }

    /**
     * retrieve all the rows matching the where condition
     * @params OPTIONAL $orderBy with the column name && dir
     */
    public function getWhereNotNull($data, $orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->whereNotNull($data)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    }

    /**
     * retrieve all the rows matching the where condition
     * @params OPTIONAL $orderBy with the column name && dir
     * @params OPTIONAL groupBy with any column
     */
    public function getWhereGroupBy($data, $column, $orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->where($data)->orderBy($orderBy['column'], $orderBy['dir'])->groupBy($column)->get();
    }

    public function getWhereDate($column, $date, $data = [],  $orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->where($data)->whereDate($column, '=', $date)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    }


    /**
     * retrieve all the row for the given model with the given relations
     * @params OPTIONAL $orderBy with the column name && dir
     * @params $data =>array of the relational models to be retrieved
     * @params $limit => count of rows per page
     */
    public function getWith(array $data, $orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->with($data)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    }

    /**
     * retrieve the model paginated with th given relations
     * @params OPTIONAL $orderBy with the column name && dir
     * @params $data =>array of the relational models to be retrieved
     */
    public function paginateWith(array $data, $orderBy = ['column' => 'id', 'dir' => 'DESC'], $limit = 10)
    {
        return $this->model->with($data)->orderBy($orderBy['column'], $orderBy['dir'])->paginate($limit);
    }

    /**
     * retrieve the model paginated with th given relations and conditions
     * @params OPTIONAL $orderBy with the column name && dir
     * @params $data =>array of the relational models to be retrieved
     */
    public function paginateWhereWith(array $data, array $with, $orderBy = ['column' => 'id', 'dir' => 'DESC'], $limit = 10)
    {
        return $this->model->with($with)->where($data)->orderBy($orderBy['column'], $orderBy['dir'])->paginate($limit);
    }


    /**
     * retrieve the model paginated
     * @params OPTIONAL $orderBy with the column name && dir
     * @params $limit => count of rows per page
     */
    public function paginate($limit = 10, $orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->orderBy($orderBy['column'], $orderBy['dir'])->paginate($limit);
    }

    public function limit($limit = null, $orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->orderBy($orderBy['column'], $orderBy['dir'])->limit($limit)->get();
    }

    public function limitGetWhere(array $data, $limit = null, $orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->where($data)->orderBy($orderBy['column'], $orderBy['dir'])->limit($limit);
    }

    /**
     * retrieve the model paginated
     * @params OPTIONAL $orderBy with the column name && dir
     * @params $limit => count of rows per page
     */
    public function paginateGetWhere(array $data,  $limit = 10, $orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->where($data)->orderBy($orderBy['column'], $orderBy['dir'])->paginate($limit);
    }

    /**
     * delete row for the given model
     * @params $id => the row id to be deleted
     */
    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    /**
     * force delete row for the given model
     * @params $id => the row id to be deleted
     */
    public function forceDelete($id)
    {
        return $this->model->where('id', $id)->forceDelete();
    }

    /**
     * restore row for the given model
     * @params $id => the row id to be restored
     */
    public function restoreOneTrashed($id)
    {
        return $this->model->where('id', $id)->restore();
    }

    /**
     * delete row for the given model
     * @params $id => the row id to be deleted
     */
    public function forceDeleteWhere(array $data)
    {
        return $this->model->where($data)->forceDelete();
    }

    /**
     * delete row for the given model
     * @params $id => the row id to be deleted
     */
    public function deleteWhere(array $data)
    {
        return $this->model->where($data)->delete();
    }

    /**
     * retrieve one row for the given model
     * @params $id => the row id to be retrieved
     */
    public function findOne($id)
    {
        return $this->model->find($id);
    }

    /**
     * retrieve one row for the given model
     * @params $slug => the row slug to be retrieved
     */
    public function findOneSlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * retrieve count of rows of the given model
     */
    public function getCount()
    {
        return $this->model->count();
    }

    /**
     * empty all rows the given model
     */
    public function deleteAll()
    {
        return $this->model::query()->delete();
    }


    /**
     * retrieve one row for the given model with where condition
     * @params $data => array of where conditions
     */
    public function findWhere(array $data, $orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->where($data)->orderBy($orderBy['column'], $orderBy['dir'])->first();
    }


    /**
     * retrieve 1 row for the given model with the given relations
     * @params $id => the row id to be retrieved
     * @params $data =>array of the relational models to be retrieved
     */
    public function findWith($id, array $data)
    {
        return $this->model->with($data)->where('id', $id)->first();
    }

    public function findWhereWith(array $data2, array $data)
    {
        return $this->model->with($data)->where($data2)->first();
    }

    /**
     * retrieve 1 row for the given model with the given relations
     * @params $id => the row id to be retrieved
     * @params $data =>array of the relational models to be retrieved
     */
    public function getWhereWith(array $with, array $data, $orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->with($with)->where($data)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    }

    public function getWhereIn($col, array $data, $orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {
        return $this->model->whereIn($col, $data)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    }

    /**
     * retrieve 1 row for the given model with trashed
     * @params $id => the row id to be retrieved
     * @params $data =>array of the relational models to be retrieved
     */
    public function findWithTrashed($id)
    {
        return $this->model->withTrashed()->where('id', $id)->first();
    }

    /**
     * retrieve 1 row for the given model with trashed and with gine relations
     * @params $id => the row id to be retrieved
     * @params $data =>array of the relational models to be retrieved
     */
    public function findWithDataAndTrashed($id, array $data)
    {
        return $this->model->withTrashed()->with($data)->where('id', $id)->first();
    }

    /**
     * give permissions to model
     * @params $id => the row id to be retrieved
     * @params $data =>array of permissions to be assigned
     */
    public function givePermissions($id, array $permissions)
    {

        $user = $this->model->find($id);

        return $user->givePermissionTo($permissions);
    }

    /**
     * delete permissions for model
     * @params $id => the row id to be retrieved
     * @params $data =>array of permissions to be deleted
     */
    public function deletePermissions($id, array $permissions)
    {

        $user = $this->model->find($id);

        return $user->revokePermissionTo($permissions);
    }

    /**
     * update permissions for model
     * @params $id => the row id to be retrieved
     * @params $data =>array of permissions to be updated
     */
    public function updatePermissions($id, array $permissions)
    {

        $user = $this->model->find($id);

        return $user->syncPermissions($permissions);
    }

    /**
     * @param array $columns
     * @return Collection
     */
    public function search(array $where = ['id', '>', 0], array $columns, $searchQuery, $orderBy = ['column' => 'id', 'dir' => 'DESC'])
    {

        $whereArr = [];
        $orWhereArr = [];
        $i = 0;
        foreach ($columns as $column) {
            if ($i == 0) {
                array_push($whereArr, $where);
                array_push($whereArr, [$column, 'LIKE', '%' . $searchQuery . '%']);
            } else {
                array_push($orWhereArr, $where);
                array_push($orWhereArr, [$column, 'LIKE', '%' . $searchQuery . '%']);
            }
            $i++;
        }


        if (count($whereArr) > 0) {
            $result = $this->model->where($whereArr)->orderBy($orderBy['column'], $orderBy['dir'])->get();
        }

        if (count($orWhereArr) > 0) {
            $result = $this->model->where($whereArr)->orWhere($orWhereArr)->orderBy($orderBy['column'], $orderBy['dir'])->get();
        }

        return $result;
    }
    //
    //    public function searchWith(array $with, array $where = ['id', '>', 0],array $columns, $searchQuery ,$orderBy = ['column' => 'id', 'dir' => 'DESC'])
    //    {
    //
    //        $whereArr = [];
    //        $orWhereArr = [];
    //        $i = 0;
    //        foreach ($columns as $column){
    //            if($i == 0){
    //                array_push($whereArr , $where);
    //                array_push($whereArr , [$column, 'LIKE', '%'.$searchQuery.'%']);
    //            }else{
    //                array_push($orWhereArr , $where);
    //                array_push($orWhereArr , [$column, 'LIKE', '%'.$searchQuery.'%']);
    //            }
    //            $i++;
    //        }
    //
    //
    //        if(count($whereArr) > 0){
    //            $result = $this->model->with($with)->where($whereArr)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    //        }
    //
    //        if(count($orWhereArr) > 0){
    //            $result = $this->model->with($with)->where($whereArr)->orWhere($orWhereArr)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    //        }
    //
    //        return $result;
    //
    //    }
    //
    //    public function searchWithWhereHas($with, array $where = ['id', '>', 0],array $columns, $searchQuery, $relation_arr, $arr_data ,$orderBy = ['column' => 'id', 'dir' => 'DESC'])
    //    {
    //
    //        $whereArr = [];
    //        $orWhereArr = [];
    //        $i = 0;
    //        foreach ($columns as $column){
    //            if($i == 0){
    //                array_push($whereArr , $where);
    //                array_push($whereArr , [$column, 'LIKE', '%' .$searchQuery. '%']);
    //            }else{
    //                array_push($orWhereArr , $where);
    //                array_push($orWhereArr , [$column, 'LIKE', '%' .$searchQuery. '%']);
    //            }
    //            $i++;
    //        }
    //
    //        if(count($whereArr) > 0){
    //            $result = $this->model->whereHas($relation_arr,function ($q) use ($arr_data){
    //                $q->where($arr_data);
    //            })->with($with)->where($whereArr)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    //
    //        }
    //
    //        if(count($orWhereArr) > 0){
    //            $result = $this->model->whereHas($relation_arr,function ($q) use ($arr_data){
    //                $q->where($arr_data);
    //            })->with($with)->where($whereArr)->orWhere($orWhereArr)->orderBy($orderBy['column'], $orderBy['dir'])->get();
    //        }
    //
    //
    //        return $result;
    //
    //    }
    //
    //    public function searchRelation(array $with, $realtion_to_search, array $where = ['id', '>', 0],array $columns, $searchQuery ,$orderBy = ['column' => 'id', 'dir' => 'DESC'])
    //    {
    //
    //        $whereArr = [];
    //        $orWhereArr = [];
    //        $i = 0;
    //        foreach ($columns as $column){
    //            if($i == 0){
    //                array_push($whereArr , $where);
    //                array_push($whereArr , [$column, 'LIKE', '%'.$searchQuery.'%']);
    //            }else{
    //                array_push($orWhereArr , $where);
    //                array_push($orWhereArr , [$column, 'LIKE', '%'.$searchQuery.'%']);
    //            }
    //            $i++;
    //        }
    //
    //        if(count($whereArr) > 0){
    //            $result = $this->model->with($with)->whereHas($realtion_to_search, function($q) use ($whereArr){
    //                $q->where($whereArr);
    //            })->orderBy($orderBy['column'], $orderBy['dir'])->get();
    //        }
    //
    //        if(count($orWhereArr) > 0){
    //            $result = $this->model->with($with)->whereHas($realtion_to_search, function($q) use ($whereArr, $orWhereArr){
    //                $q->where($whereArr)->orWhere($orWhereArr);
    //            })->orderBy($orderBy['column'], $orderBy['dir'])->get();
    //        }
    //
    //        return $result;
    //
    //    }

}
