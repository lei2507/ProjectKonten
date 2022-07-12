<div class="container mt-5 rounded shadow border p-5">
    <h2 class="text-center fw-bold text-uppercase">Register Page</h2>
    <form wire:submit.prevent="store">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name" placeholder="Your name...">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="email" wire:model="email" placeholder="Your email...">
            @error('email')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" wire:model="password" placeholder="Your password...">
            @error('password')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password Confirmation</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" wire:model="password_confirmation" placeholder="Your confirmation password...">
            @error('password_confirmation')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <span>Sudah punya akun? </span><a class="text-decoration-none" href="/login">Signin</a>
        </div>
        <button type="submit" class="btn btn-primary">Create New Account</button>
    </form>
</div>
