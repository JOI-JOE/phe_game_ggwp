<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index() {}


    public function show() {}

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description'  => 'required',
            'handle' => 'required|unique:products',
            'page_title' => 'required',
            'price' => 'required',
            'type_id' => 'required|exists:types,id',
            'published_at' => 'required',
            'not_allow_promotion' => 'in:0,1',
        ];

        $validator = Validator::make($request->all(), $rules);
        $temporaryFiles = TemporaryFile::all();
        // if($validator->fails()){
        foreach ($temporaryFiles as $temporaryFile) {
            Storage::deleteDirectory('images/tmp/' . $temporaryFile->folder);
            $temporaryFile->delete();
        }
        // }
        if ($validator->passes()) {

            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->handle = $request->handle;
            $product->page_title = $request->page_title;
            $product->price = $request->price;
            $product->type_id = $request->type_id;
            $product->published_at = $request->published_at;
            $product->not_allow_promotion = $request->not_allow_promotion;
            $product->save();

            $temporaryFiles = TemporaryFile::all();
            // if($validator->fails()){
            // foreach ($temporaryFiles as $temporaryFile) {
            //     Storage::deleteDirectory('images/tmp' . $temporaryFile->folder);
            //     $temporaryFile->delete();
            // }
            // // }

            return response()->json([
                'status' => true
            ]);
        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'data'   =>  $request->all()
            ]);
        }
        // // dd($request);
        // // $tmp_file = TemporaryFile::where('folder', $request->feature_image)->first();

        // // if ($tmp_file) {
        // //     Storage::copy('posts/tmp/' . $tmp_file->folder . '/' . $tmp_file->file, 'posts/' . $tmp_file->file);

        // //     // 'image' => $tmp_file->folder .  '/' . $tmp_file->file;
        // //     Storage::deleteDirectory('posts/tmp/' . $tmp_file->folder);
        // //     $tmp_file->delete();
        // // }

        // $temporaryFiles = TemporaryFile::all();
        // // if($validator->fails()){
        // foreach ($temporaryFiles as $temporaryFile) {
        //     Storage::deleteDirectory('images/tmp' . $temporaryFile->folder);
        //     $temporaryFile->delete();
        // }
        // // }

        // // $product = Product::create(attributes: $validator->validated());

        // foreach ($temporaryFiles as $temporaryFile) {
        //     Storage::copy('images/tmp' . $temporaryFile->folder . '/' . $temporaryFile->file, 'images/' . $temporaryFile->folder . '/' . $temporaryFile->file);

        //     // createa 

        //     Storage::deleteDirectory('images/tmp/' . $temporaryFile->folder);
        //     $temporaryFile->delete();
        // }
    }
    public function tmpUpload(Request $request)
    {
        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $file_name = $image->getClientOriginalName();
            $folder = uniqid(prefix: 'image-', more_entropy: true);
            $image->storeAs('images/tmp/' . $folder, $file_name);
            TemporaryFile::create([
                'folder' => $folder,
                'file' => $file_name
            ]);
            return $folder;
        }
        return '';
    }

    public function tmpDelete()
    {
        $tmp_file = TemporaryFile::where('folder', request()->getContent())->first();
        if ($tmp_file) {
            Storage::deleteDirectory('images/tmp/' . $tmp_file->folder);
            $tmp_file->delete();
            return response('');
        }
    }
}
