<?php

namespace App\Http\Controllers;

use App\LumbungPadi;
use App\SewaTratak;
use App\AirBersih;
use App\Informasi;
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lumbungpadi = Lumbungpadi::inRandomOrder()->paginate(10);
        $sewatratak = SewaTratak::inRandomOrder()->paginate(10);
        $airbersih = AirBersih::inRandomOrder()->paginate(10);
        $informasi = Informasi::inRandomOrder()->paginate(10);
    
        
        return view('home', compact('lumbungpadi','sewatratak', 'airbersih', 'informasi'));
    }
}
