<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        $user = Auth::user();
        $totalLayananZoom = DB::table('layanan_zoom')->count();
        return view('admin.index',compact('user','totalLayananZoom'));
    }
}
