<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\StoreRequest;
use App\Services\RegisterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function Termwind\render;

class RegisterController extends Controller
{

    public function index()
    {
        return view('register');
    }

    public function store(StoreRequest $request, RegisterService $service)
    {
        $data = $request->validated();
        return $service->identityCheck($data);
    }

}
