<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;

class ProductManager extends Component
{
    use WithFileUploads;

    public $products;
    public $name, $description, $price, $image, $product_id;
    public $isEdit = false;

    public function mount()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $this->products = Product::all();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->image = null;
        $this->product_id = null;
        $this->isEdit = false;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $this->image ? $this->image->store('products', 'public') : null;

        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $imagePath,
        ]);

        session()->flash('success', 'Product added successfully.');
        $this->resetForm();
        $this->loadProducts();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = Product::findOrFail($this->product_id);

        if ($this->image) {
            $imagePath = $this->image->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $product->image,
        ]);

        session()->flash('success', 'Product updated.');
        $this->resetForm();
        $this->loadProducts();
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('success', 'Product deleted.');
        $this->loadProducts();
    }

    public function render()
    {
        return view('livewire.product-manager');
    }
}
