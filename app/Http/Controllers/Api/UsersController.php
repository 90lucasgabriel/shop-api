<?php
namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use GuzzleHttp\Client;

class UsersController extends Controller{    
    private $secret = 'SecretPasswordSocial!';
    private $userRepository;

    public function __construct(
        UserRepository      $userRepository
    ){
        $this->userRepository   = $userRepository;
    }

    public function create(Request $request){
        $data                   = $request->all();

        $data["password"]       = bcrypt($data["password"]);        
        $data["remember_token"] = str_random(10);

        return $this->userRepository->create($data);
    }

    public function login(Request $request){


/*
        $client = new Client();

        
        $request = $client->post('http://localhost:8000/oauth/token', [
            'form_params'   => [    
                'grant_type'    => "password",
                'client_id'     => $data["client_id"],
                'client_secret' => $data["client_secret"],
                'username'      => $data["username"],
                'password'      => $data["password"],
                'scope'         => ''
            ]
        ]);

        return json_decode((string) $request->getBody(), true);


        $request->then(function($response){
            dd($response);
        });*/


    }

    public function authenticated(){
        $id   = Authorizer::getResourceOwnerId();
        $user = $this->userRepository->skipPresenter(false)->find($id);

        return $user;
    }

    public function updateDeviceToken(Request $request){
        $id          = Authorizer::getResourceOwnerId();
        $deviceToken = $request->get('device_token');
        
        return $this->userRepository->updateDeviceToken($id, $deviceToken);
    }

    public function findByToken($social, $token){
        //dd((md5('facebook90lucasgabriel@gmail.comSecretPasswordSocial!')));
        return $this->userRepository->skipPresenter(false)->findByToken($social, $token);
    }

}
