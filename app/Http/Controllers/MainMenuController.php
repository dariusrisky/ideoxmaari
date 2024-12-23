<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainMenuController extends Controller
{
    public function Index()  {
        $data['data']= menu::all();
        return view('menu', $data);

    }

    public function addmenu(){
        return view('addmenucard');
    }

    public function menuaddaction(Request $request)  {
        $data['data']= menu::all();
        
        $request->validate(
            [
                'title'=>'string',
                'link'=>'string',
                'image'=>'image|mimes:jpg,png,gif',
                'priority'=>'integer'
            ]
            );

        $path = $request->file('image')->store('image','public');

        menu::create([
            'title' => $request->input('title'),
            'path' => $path,
            'link'=> $request->link,
            'priority'=>$request->priority
        ]);
        
       return redirect()->route('menu');
    }

    public function menudelete($id, menu $delete){

        
        $menu = menu::findOrFail($id);

        // Hapus file di storage
        if ($delete->path && Storage::exists('public/storage' . $delete->path)) {
            Storage::delete('public/storage' . $delete->path);
        }


        // Hapus data di database
        $menu->delete();

        return redirect()->back()->with('success', 'Data and file deleted successfully.');

        // $id = menu::all();
        // $menu = $id->find($d);
        // $menu->delete();
        // if (Storage::exists($delete->d)) {
        //     Storage::delete($delete->d);
        // }

        // return redirect()->route('menu')
        // ->with('success','images has deleted');
    }

    public function editmenu(menu $d, $id){
        $data['title']='update';
        $data['data']= menu::findOrFail($id); 
        // dd($data['data']);
        
        return view('editmenu', $data);
    }

    public function editmenuaction(Request $request, menu $product_img)
    {
        $data['data']= menu::all();

        $request->validate([
            'title' => 'required|string|max:255', 
            'image2' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', 
        ]);
        
        $product_img->title = $request->input('title');

        if ($request->hasFile('image2')) {
            if ($product_img->path && Storage::exists('public/' . $product_img->path)) {
                Storage::delete('public/' . $product_img->path);
            }

            $path = $request->file('image2')->store('image', 'public');
            $product_img->path = $path;
        }

        $product_img->save();

        return redirect()->route('menu');
    }
    
    public function header(header $d, $id){
        $data['title']='update';
        $data['data']= header::findOrFail($id); 
        // dd($data['data']);
        
        return view('header', $data);
    }

    public function HeaderMaster(Request $request, header $id) {
        
        $data['data']= header::all();

        $request->validate([
            'title' => 'string|max:255', 
            'image2' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', 
        ]);
        
        $id->title = $request->input('title');

        if ($request->hasFile('image2')) {
            if ($id->path && Storage::exists('public/' . $id->path)) {
                Storage::delete('public/' . $id->path);
            }

            $path = $request->file('image2')->store('image', 'public');
            $id->path = $path;
        }

        $id->save();

        return redirect()->route('menu');

    }
    public function main(){

    }

    public function event() {
        
    }
}
