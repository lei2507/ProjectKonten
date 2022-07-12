<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{

    public $product_id;

    public function deleteConfirmation($id)
    {
        $this->product_id = $id;
    }

    public function destroy()
    {
        $product = Product::find($this->product_id);
        $path = 'storage/' . $product->image;

        if($product) {
            if(File::exists($path)) {
                File::delete($path);
            }
            $product->delete();
            $this->emit('productDeleted');

            return back()->with('success', 'Produk berhasil dihapus');
        } else {
            return back()->with('error', 'Produk gagal dihapus');
        }
    }

    public function render()
    {
        $products = Product::latest()->get();

        return view('livewire.product.index', compact('products'));
    }
}
