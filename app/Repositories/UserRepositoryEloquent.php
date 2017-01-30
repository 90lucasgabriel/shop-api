<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\UserPresenter;
use App\Repositories\UserRepository;
use App\Models\User;
use App\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    public function queryDeliveryman($column, $key=null){
        return $this->model->where(['role'=>'deliveryman'])->lists($column, $key);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){
        return UserPresenter::class;
    }

    public function updateDeviceToken($id, $deivceToken){
        $model = $this->model->find($id);
        $model->device_token = $deivceToken;
        $model->save();

        return $this->parserResult($model);
    }
}
