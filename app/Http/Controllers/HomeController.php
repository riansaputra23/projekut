<?php

namespace App\Http\Controllers;
use App\Models\home;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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

        $homes = home::all();
        // dd($homes);
        return view('home', (['homes' => $homes]));
    }

//     public function index()
//    {
//         $home = Home::all();
//         return view ('creathome', ['home'=>$karyawan]);
//     }

    public function create()
    {
        return view('createhome');
    }

    public function store(Request $request)
    {
        

        $validateData = $request->validate([
            'title_1'=>'required',
            'title_2'=>'required',
            'title_3'=>'required',
            'button_left'=>'required',
            'button_right'=>'required',
            'about_me_title'=>'required',
            'about_me_description'=>'required',
            'image_path'=>'required',
        ]);
        if($request->file('image_path')) {
            $validateData['image_path'] = $request->file('image_path')->store('home-images');
        }

        home::create($validateData);
        return redirect('/dashboardhome')->with('success', 'Berhasil');
    }

    public function edit(home $home)
    {
        return view('editmyhome', [
            'home' => $home,
        ]);
    }
    
    public function update(Request $request, home $home)
    {
        

        $validateData = $request->validate([
            'title_1'=>'required',
            'title_2'=>'required',
            'title_3'=>'required',
            'button_left'=>'required',
            'button_right'=>'required',
            'about_me_title'=>'required',
            'about_me_description'=>'required',
            'image_path'=>'required',
        ]);
        if($request->file('image_path')) {
            $validateData['image_path'] = $request->file('image_path')->store('home-images');
        }

        $home->update($validateData);
        return redirect('/dashboardhome')->with('success', 'Berhasil');
    }


    public function destroy(home $home)
    {
        $home->delete();
        return redirect('/dashboardhome')->with('success', 'Berhasil Dihapus');
    }
}