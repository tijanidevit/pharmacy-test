<?php


namespace App\Services;
use App\Traits\FileTrait;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService {
    use FileTrait;
    public function __construct(protected Category $category) {}

    public function getAllCategories() : array|Collection {
        return $this->category->orderBy('name')->get();
    }

    public function addCategory($data) : Category {
        $data['image'] = $this->uploadFile('images/categories/',$data['image']);
        $data['added_by'] = auth()->id();
        return $this->category->create($data);
    }

    public function getCategory($category) : Category {
        return $category->load('products');
    }

    public function deleteCategory($category) : bool {
        return $category->delete();
    }
}
