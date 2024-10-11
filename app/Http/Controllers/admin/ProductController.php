<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('product_images')->get();

        return view('admin.product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::query()->findOrFail($id);
        return $product;
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'handle' => 'required|unique:products',
            'page_title' => 'required',
            'price' => 'required',
            'type_id' => 'required|exists:types,id',
            'published_at' => 'required',
            'not_allow_promotion' => 'in:0,1',
        ];

        $validator = Validator::make($request->all(), $rules);

        $temporaryFiles = TemporaryFile::all();

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

            if (!empty($request->feature_image)) {
                foreach ($temporaryFiles as $temporaryFile) {

                    $extArray = explode('.', $temporaryFile->file);

                    $ext = last($extArray);
                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->src = 'NULL';
                    $productImage->save();

                    $imageName = $product->id . '-' . $productImage->id . '-' . time() .  '.' . $ext;
                    $productImage->src = $imageName;
                    $productImage->save();
                    Storage::copy('images/tmp' . '/' . $temporaryFile->folder . '/' . $temporaryFile->file, 'product' . '/' . $imageName);

                    Storage::deleteDirectory('images/tmp/' . $temporaryFile->folder);
                    $temporaryFile->delete();
                }
            }


            return response()->json([
                'status' => true
            ]);
        } else {

            foreach ($temporaryFiles as $temporaryFile) {
                Storage::deleteDirectory('images/tmp/' . $temporaryFile->folder);
                $temporaryFile->delete();
            }

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'data'   =>  $request->all()
            ]);
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $product_images = ProductImage::where('product_id', $product->id)->get();
        return view('admin.product.edit', compact('product', 'product_images'));
    }

    public function update(Request $request, $id)
    {

        $product = Product::query()->findOrFail($id);

        $rules = [
            'name' => 'required',
            'handle' => 'required',
            'page_title' => 'required',
            'price' => 'required',
            'type_id' => 'required|exists:types,id',
            'published_at' => 'required',
            'not_allow_promotion' => 'in:0,1',
        ];

        $temporaryFiles = TemporaryFile::all();

        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {

            $product->name = $request->name;
            $product->description = $request->description;
            $product->handle = $request->handle;
            $product->page_title = $request->page_title;
            $product->price = $request->price;
            $product->type_id = $request->type_id;
            $product->published_at = $request->published_at;
            $product->not_allow_promotion = $request->not_allow_promotion;
            $product->save();

            $old_images  = ProductImage::where('product_id', $product->id)->get();
            if (!empty($request->feature_image)) {


                foreach ($temporaryFiles as $temporaryFile) {

                    $extArray = explode('.', $temporaryFile->file);

                    $ext = last($extArray);
                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->src = 'NULL';
                    $productImage->save();

                    $imageName = $product->id . '-' . $productImage->id . '-' . time() .  '.' . $ext;

                    $productImage->src = $imageName;
                    $productImage->save();
                    Storage::copy('images/tmp' . '/' . $temporaryFile->folder . '/' . $temporaryFile->file, 'product' . '/' . $imageName);

                    Storage::deleteDirectory('images/tmp/' . $temporaryFile->folder);
                    $temporaryFile->delete();
                }

                if ($old_images) {
                    foreach ($old_images as $image) {
                        $image->delete();
                    }
                }
            }


            return response()->json([
                'status' => true
            ]);
        } else {
            $temporaryFiles = TemporaryFile::all();
            foreach ($temporaryFiles as $temporaryFile) {
                Storage::deleteDirectory('images/tmp/' . $temporaryFile->folder);
                $temporaryFile->delete();
            }

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'data'   =>  $request->all()
            ]);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $productImage = ProductImage::where('product__id', $product->id);

        if (empty($product)) {
            return response()->json([
                'status' => false,
                'message' => 'product not found'
            ]);
        }
        $product->delete();
        if ($productImage) {
            foreach ($productImage as $image) {
                $image->delete();
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'product deleted successfully',
        ]);
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
