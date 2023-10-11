<?php


namespace App\Services;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService {
    public function __construct(protected Category $category) {}

    public function getAllCategories() : array|Collection {
        return $this->category->orderBy('name')->get();
    }

    public function addCategory($data) : Category {
        $data['added_by'] = auth()->id();
        return $this->category->create($data);
    }

    public function getCategory($id) : Category|null {
        return $this->category->whereId($id)->with('products')->first();
    }

    public function deleteCategory($id) : bool {
        return $category->whereId($id)->delete();
    }
}
