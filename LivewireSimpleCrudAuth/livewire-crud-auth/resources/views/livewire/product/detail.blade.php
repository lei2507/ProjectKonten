<div class="mt-5 container shadow p-4 border">

    <div class="mb-4">
        <a href="/" class="btn btn-secondary me-2">Back</a>
        <a href="/edit/{{ $product->id }}" class="btn btn-warning">Edit</a>
    </div>

    <div class="d-flex">
            <img class="border border-dark" src="{{ asset('storage/' . $product->image) }}" width="600">
        <div class="ms-5">
            <ul class="list-group">
                <li class="list-group-item" aria-current="true"><b>Product Name:</b> {{ $product->name }}</li>
                <li class="list-group-item"><b>Stock :</b> {{ $product->stock }}</li>
                <li class="list-group-item"><b>Price :</b> {{ number_format($product->price) }}</li>
                <li class="list-group-item"><b>Description :</b> {!! $product->description !!}</li>
            </ul>
        </div>
    </div>
</div>
