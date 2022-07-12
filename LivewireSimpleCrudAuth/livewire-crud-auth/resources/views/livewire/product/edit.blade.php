<div class="container mt-5 shadow p-4 border">
    <div class="d-flex justify-content-between mb-3">
        <h3 class="fw-semibold">Edit Product</h3>
        <a href="/" class="btn btn-secondary">Back</a>
    </div>
    <form wire:submit.prevent="update({{ $product->id }})" enctype="multipart/form-data">
            <div class="my-3">
                @if ($product->image)
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" width="200" alt="">
                    @else
                        <img src="{{ asset('storage/' . $product->image) }}" width="200" alt="">
                    @endif
                @endif
            </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image"
                wire:model="image">
            @error('image')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                wire:model="name" placeholder="Product name...">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock"
                    wire:model="stock" placeholder="Product stock...">
                @error('stock')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror

            </div>
            <div class="col-6">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                    wire:model="price" placeholder="Product price...">
                @error('price')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" wire:model="description"
                rows="4" placeholder="Write description product here..."></textarea>
            @error('price')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Update Product</button>
    </form>
</div>
