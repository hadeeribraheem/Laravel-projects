<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use App\Repositories\Auth\RegisterRepository;
use App\Services\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    private $repo;

    public function __construct(RegisterRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(UserFormRequest $request)
    {
        return $this->repo->create_user($request->validated());


    }
}
