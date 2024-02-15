<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller{

    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function ListUsers(){
        return response()->json( User::all()->where('active','Y'));
    }

}
