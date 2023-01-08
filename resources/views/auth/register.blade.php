@extends('layouts/home')
@section('content')
    <div class="container" style="margin-bottom: 200px">
        <main class="form-signin w-100 m-auto">
            <form action="/register" method="POST">
                @csrf
                <h1 class="h3 mb-3 fw-normal text-center" style="margin-top: 100px">Form Register</h1>
            
                <div class="form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name" required value="{{ old('name') }}">
                    <label for="name">Nama</label>
                    @error('name')    
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Email</label>
                    @error('email')    
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')    
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                <small>You Have Account? <a href="/login" class="text-decoration-none">Login</a></small>
            </form>
      </main>
    </div>
@endsection