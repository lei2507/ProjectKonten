<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h3 class="text-uppercase fw-semibold text-center">Tutorial Laravel Livewire CRUD dan Auth</h3>

    <div class="d-flex justify-content-between my-3">
        <a href="{{ route('product.create') }}" class="btn btn-primary px-3 py-1">Create</a>
        @livewire('auth.logout')
    </div>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Stock</th>
                <th scope="col">Price</th>
                <th scope="col">CreatedAt</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ number_format($product->price) }}</td>
                    <td>{{ $product->created_at->format('M d, Y') }}</td>
                    <td>
                        <a href="{{ route('product.detail', $product->id) }}"
                            class="btn badge text-bg-info">Detail</a>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn badge text-bg-warning">Edit</a>
                        <button wire:click.prevent="deleteConfirmation({{ $product->id }})"
                            class="btn badge text-bg-danger" data-bs-toggle="modal" data-bs-target="#deleteProductModal">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProductModalLabel">Delete Confirmation</h5>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin mau menghapus produk ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button wire:click.prevent="destroy({{ $product_id }})" class="btn btn-primary">Yes, delete it</button>
                </div>
            </div>
        </div>
    </div>

</div>

