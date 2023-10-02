<?php

namespace App\Controllers;
use App\Models\ContactsModel;
use App\Models\GroupsModel;

class HomeController extends BaseController
{
    public function index()
    {
        return view('home');
    }
}
