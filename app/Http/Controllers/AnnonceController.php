<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use App\Models\Annonce;
use App\Models\User;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function index()
    {
        $annonces = Annonce::all();
        return view('adverts', [
            'annonces' => $annonces
        ]);
    }

    public function show()

    {
        return view('Createadvert');
    }

    public function myAdverts()
    {
        $user = Auth::user();

        $annonces = Annonce::where('user_id', $user->id)->get();

        return view('myAdverts',[
            'annonces' => $annonces
        ]);
    }

    public function createAdvert(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'title' => 'required|string|max:30|min:3',
            'description' => 'required|string|min:1',
            'price' => 'required|integer|min:1',
            'address' => 'required|string|min:8',
            'city' => 'required|string|min:4',
            'phone' => 'required|numeric|min:10',
        ]);

        $annonce = Annonce::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'user_id' => $user->id
        ]);

        foreach ($request['picture'] as $picture) {
            if ($picture != '') {
                $imgPath = $picture->store('images');
                Photo::create([
                    'annonce_id' => $annonce->id,
                    'picture' => $imgPath
                ]);
            }
        }
        return redirect()->to('/');
    }

    public function updateAdvert()
    {

    }


    public function deleteAdvert($id)
    {
        $annonce = Annonce::findorFail($id);

        $annonce->delete();

          return redirect()->to('myAdverts');
    }
}
