<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected  $model; 

    public function __construct(string $model)
    {
        $this->model = $model;
    }
}
