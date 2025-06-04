<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;

class ProductManager extends Component
{
    use WithFileUploads;

    public $name, $description, $price, $image, $product_id;
    public $isEdit = false;

    public function resetForm()
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->image = null;
        $this->product_id = null;
        $this->isEdit = false;

        $this->dispatch('clearFileInput');
    }

    public function submitForm()
    {
        if ($this->isEdit) {
            $this->update();
        } else {
            $this->save();
        }
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

        session()->flash('message', 'Product added successfully.');
        $this->resetForm();
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

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ];

        if ($this->image) {
            $data['image'] = $this->image->store('products', 'public');
        }

        $product->update($data);

        session()->flash('message', 'Product updated successfully.');
        $this->resetForm();
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('message', 'Product deleted.');
    }

    public function render()
    {
        return view('livewire.product-manager', [
            'products' => Product::all(),
        ]);
    }
}
