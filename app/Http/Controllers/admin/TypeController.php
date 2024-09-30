<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::orderBy('id')->get();
        return view('admin.type.index', compact('types'));
    }

    public function create()
    {
        return view('admin.type.create');
    }

    public function store(Request $request, Type $type)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:types',
        ]);

        if ($validator->passes()) {
            $type = new Type();
            $type->name = $request->name;
            $type->slug = $request->slug;
            $type->status = $request->status;
            $type->save();

            return response()->json([
                'status' => true,
                'message' => 'Type added successfully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    public function show($id)
    {
        $type = Type::latest()->find($id);
        return $type;
    }

    public function edit($id)
    {
        $type = Type::latest()->find($id);
        return view('admin.type.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $type = Type::find($id);

        if (empty($type)) {
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Type not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:types,slug,' . $type->id . ',id',
        ]);

        if ($validator->passes()) {
            $type->name = $request->name;
            $type->slug = $request->slug;
            $type->status = $request->status;
            $type->save();

            return response()->json([
                'status' => true,
                'message' => 'Type added successfully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($id)
    {
        $type = Type::find($id);
        if (empty($type)) {
            return response()->json([
                'status' => false,
                'message' => 'Type not found'
            ]);
        }
        $type->delete();
        return response()->json([
            'status' => true,
            'message' => 'Type deleted successfully',
        ]);
    }
}
