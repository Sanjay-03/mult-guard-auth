@include('layouts.includes.header')
<div class="container">
    <div class="text-center my-3">
        @if ($errors->any())
            <p class="text-danger">{{ $errors->first() }}</p>
        @endif
    </div>
    <!-- Login Form -->
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <h2>Login</h2>
            <form action="customer/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <!-- Signup Form -->
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <h2>Sign Up</h2>
            <form action="customer/signup" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
        </div>
    </div>
</div>
@include('layouts.includes.footer')
