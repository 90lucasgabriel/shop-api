<?php
namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UsersController extends Controller{    
    private $userRepository;
    public function __construct(
        UserRepository      $userRepository
    ){
        $this->userRepository       = $userRepository;
    }

    public function create(Request $request){
        $data                   = $request->all();
        $data["password"]       = bcrypt($data["password"]);
        $data["remember_token"] = str_random(10);

        return $this->userRepository->create($data);
    }

    public function authenticated(){
        $id = Authorizer::getResourceOwnerId();
        $user = $this->userRepository->skipPresenter(false)->find($id);        

        return $user;
    }

    public function updateDeviceToken(Request $request){
        $id = Authorizer::getResourceOwnerId();
        $deviceToken = $request->get('device_token');
        
        return $this->userRepository->updateDeviceToken($id, $deviceToken);
    }
}
