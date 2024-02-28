<?php

namespace App\Http\Controllers;

use App\Contracts\IUserRepository;
use App\DTO\UserDTO;
use App\Exceptions\BusinessExeption;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\organization;
use App\Models\User;
use App\Repository\UserRepository;
use App\Services\CreateUsersService;
use App\Services\UpdateUsersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    protected  $updateUsersService;
    private IUserRepository $repository;
    public function __construct(UpdateUsersService $updateUsersService)
    {$this->updateUsersService= $updateUsersService;
$this->repository=new UserRepository();
    }
    /**
     * Display a listing of the resource.
     */
    public function index():\Illuminate\Http\JsonResponse
    {
        $users= User::all();
        return response()->json([
            'data'=>$users
        ]);
    }


    public function store(UserRequest $request,CreateUsersService $services):UserResource
    {
        $validated=$request->validated();
    $user=$services->execute(UserDTO:: fromArray($validated) );
    return new UserResource($user);
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id): UserResource
    {
        $user=$this->repository->getUserById($id);
        if ($user===null){
            return response()->json(['message'=>'User not found'],400);
        }
        return new UserResource($user);
    }


    public function update(UserRequest $request,int $userId ):UserResource
    {
        $validated=$request->validated();
            $user = $this->updateUsersService->updateUsersService($userId, UserDTO::fromArray($validated));
            return new UserResource($user);
    }

    public function destroy(string $id):JsonResponse
    {
        $user=$this->repository->getUserById($id);
        if($user===null){
            return response()->json(['message'=>'запись не найдена.']);
        }
        $user->delete();
        return response()->json(['message'=>'запись была успешно удалена.']);
    }
    public function getOrganizationUsers(int $organization_id):JsonResponse|AnonymousResourceCollection
    {$organization=organization::query()->find($organization_id);
        if($organization===null){
            return response()->json(['message'=>'Organization not found'],400);
        }
$users=$organization->users;
        return UserResource::collection($users);
    }

    /**
     * @param int $organization_id
     * @param int $user_id
     * @return UserResource|JsonResponse
     */
    public function getOrganizationUserById(int $organization_id, int $user_id):UserResource|JsonResponse
        /** @param  Organization|null $organization */
    {$organization=organization::query()->find($organization_id);
        if($organization===null){
            return response()->json(['message'=>'Organization not found'],400);
        }
        $user=$organization->users()->find($user_id);
        if($user ===null){
            return response()->json(['message'=>'Users not found'],400);}
        return new UserResource ($user);
    }


    }



