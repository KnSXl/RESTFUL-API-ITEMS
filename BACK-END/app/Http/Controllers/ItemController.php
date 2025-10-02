<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    use ResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Item::query();
        $fields = ['id', 'name', 'description', 'created_at', 'updated_at'];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                $query->where($field, 'like', '%' . $request->input($field) . '%');
            }
        }

        $items = $query->paginate(15);

        return ItemResource::collection($items);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $item = Item::find($id);

        if (!$item) {
            return $this->errorResponse(__('item.itemnotfound'), 404);
        }

        return $this->successResponse(__('item.itemfoundsuccessfully'), new ItemResource($item), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        $item = Item::create($request->all());
        $item->refresh();

        return $this->successResponse(__('item.itemcreatedsuccessfully'), new ItemResource($item), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, int $id)
    {
        $item = Item::find($id);

        if (!$item) {
            return $this->errorResponse(__('item.itemnotfound'), 404);
        }

        $item->update($request->all());
        $item->refresh();

        return $this->successResponse(__('item.itemupdatedsuccessfully'), new ItemResource($item), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $item = Item::find($id);

        if (!$item) {
            return $this->errorResponse(__('item.itemnotfound'), 404);
        }

        $item->delete();

        return $this->successResponse(__('item.itemdeletedsuccessfully'), new ItemResource($item), 200);
    }
}
