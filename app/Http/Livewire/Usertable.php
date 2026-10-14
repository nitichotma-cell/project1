<?php


namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Usertable extends Component
{
    use WithFileUploads;

    public $name = '';
    public $description = '';
    public $price = '';
    public $image;
    public $editingProductId = null;
    

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $this->image
            ? $this->image->store('products', 'public')
            : null;

        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $imagePath,
        ]);

        $this->reset(['name', 'description', 'price', 'image']);
        session()->flash('message', 'เพิ่มสินค้าเรียบร้อยแล้ว');
    }

    public function delete($productId)
    {
        $product = Product::findOrFail($productId);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
    }

    public function render()
    {
        $products = Product::latest()->get();

        return view('livewire.usertable', compact('products'));
    }

    public function update()
{
    $this->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:2048',
    ]);

    $product = Product::findOrFail($this->editingProductId);

    $imagePath = $product->image;

    if ($this->image) {
        if ($imagePath) {
            Storage::disk('public')->delete($imagePath);
        }

        $imagePath = $this->image->store('products', 'public');
    }

    $product->update([
        'name' => $this->name,
        'description' => $this->description,
        'price' => $this->price,
        'image' => $imagePath,
    ]);

    $this->reset(['name', 'description', 'price', 'image', 'editingProductId']);
    session()->flash('message', 'แก้ไขสินค้าเรียบร้อยแล้ว');
}

public function cancelEdit()
{
    $this->reset(['name', 'description', 'price', 'image', 'editingProductId']);

    
}
public function edit($productId)
{
    $product = Product::findOrFail($productId);

    $this->editingProductId = $product->id;
    $this->name = $product->name;
    $this->description = $product->description;
    $this->price = $product->price;
    $this->image = null;
}

}