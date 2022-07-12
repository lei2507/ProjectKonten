<div class="container mt-5 rounded shadow border p-5">
    <h2 class="text-center fw-bold text-uppercase">Login Page</h2>
    @if(session('success'))
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
    <form wire:submit.prevent="login">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" wire:model="email" placeholder="Your email...">
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
        <div class="d-flex justify-content-between">
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="remember" wire:model="remember">
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>
            <div class="mb-3">
                <span>Belum punya akun? </span><a class="text-decoration-none" href="/register">Signup</a>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
</div>

