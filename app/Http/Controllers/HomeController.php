<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class HomeController extends Controller
{
    /**
     * index
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
    
    public function index() : View
    {
        //get all products
        $games = Game::latest()->paginate(10);

        //render view with products
        return view('home.index', compact('games'));
    }


    public function store(Request $request){
        try{
            DB::beginTransaction();
            $insert                     = new Game();
            $insert->judul              = $request->judul;
            $insert->penerbit           = $request->penerbit;
            $insert->pengembang         = $request->pengembang;
            $insert->deskripsi          = $request->deskripsi;
            $insert->tanggal_rilis      = $request->tanggal_rilis;
            $insert->save();

            DB::commit();

            return redirect()->route('home');
        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function show(string $id) : View
    {
        $show = Game::findOrFail($id);
        return view('home.show', compact('show'));
    }

    public function update(Request $request, $id) {
        try{

            $game = Game::findOrFail($id);
            $game->update([
                'judul'          => $request->judul,
                'penerbit'      => $request->penerbit,
                'pengembang'     => $request->pengembang,
                'deskripsi'           => $request->deskripsi,
                'tanggal_rilis'           => $request->tanggal_rilis
            ]);

            return redirect()->route('home');
        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id){
        try{

            $tempat = Game::findOrFail($id);
            $tempat->delete();

            return redirect()->route('home');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

}
