<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Detail extends Component
{
    public $ids;

    public function mount($id)
    {
        $this->ids = $id;
    }

    public function render()
    {
        $product = Product::find($this->ids);
        return view('livewire.product.detail', compact('product'));
    }
}
