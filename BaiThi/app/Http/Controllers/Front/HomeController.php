<?php


namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Web;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }
    public function store(Request $request){
        $request ->validate([
            'product_code'=>'required',
            'name'=>'required',
            'price'=>'required',
            'avatar'=>'required',

        ]);
        Web::create($request->all());
        return redirect()->route('index')
            ->with('success','Done!');
    }
    public function getDashboard()
    {
        $posts = Web::all();
        return view('index', compact('posts'));
    }

    public function search(Request $request){

        $search = $request->get('search');
        $posts = DB::table('posts')->where('name','like','%'.$search.'%')->paginate(10);

        return view('index',compact('posts',));
    }
}
