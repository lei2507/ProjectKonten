<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
class Create extends Component
{
    use WithFileUploads;

    public $image;
    public $name;
    public $stock;
    public $price;
    public $description;

    protected $rules = [
        'image' => 'required|file|image|max:2000',
        'name' => 'required|unique:products,name',
        'stock' => 'required|integer',
        'price' => 'required|integer',
        'description' => 'required'
    ];

    public function updated()
    {
        $this->validate();
    }

    public function store()
    {
        $this->validate();
        $fileName = $this->image->store('products/images', 'public');

        $product = Product::create([
            'image' => $fileName,
            'name' => $this->name,
            'stock' => $this->stock,
            'price' => $this->price,
            'description' => $this->description
        ]);

        if($product) {
            return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan');
        } else {
            return redirect()->route('product.index')->with('error', 'Produk gagal ditambahkan');
        }
    }

    public function render()
    {
        return view('livewire.product.create');
    }
}
