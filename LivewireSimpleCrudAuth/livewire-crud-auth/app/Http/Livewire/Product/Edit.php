<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $ids;
    public $image;
    public $name;
    public $stock;
    public $price;
    public $description;

    protected $rules = [
        'name' => 'required',
        'stock' => 'required|integer',
        'price' => 'required|integer',
        'description' => 'required'
    ];

    public function mount($id)
    {
        $product = Product::find($id);

        if($product) {
            $this->ids = $product->id;
            $this->name = $product->name;
            $this->stock = $product->stock;
            $this->price = $product->price;
            $this->description = $product->description;
        }
    }

    public function updated()
    {
        $this->validate();
    }

    public function update($id)
    {
        $this->validate();

        $product = Product::find($id);
        $fileName = $product->image;

        if($this->image) {
            $path = 'storage/' . $product->image;
            if(File::exists($path)) {
                File::delete($path);
            }
            $fileName = $this->image->store('products/images', 'public');
        }

        $product->image = $fileName;
        $product->name = $this->name;
        $product->stock = $this->stock;
        $product->price = $this->price;
        $product->description = $this->description;

        $product->update();

        if($product) {
            return redirect()->route('product.index')->with('success', 'Produk berhasil diubah');
        } else {
            return redirect()->route('product.index')->with('error', 'Produk gagal diubah');
        }
    }

    public function render()
    {
        $product = Product::find($this->ids);

        return view('livewire.product.edit', compact('product'));
    }
}
