@extends('layouts/home')

@section('content')

      <!-- Header-->
      <header class="bg-dark py-5 text-break">
        <div class="container px-4 px-lg-5 my-5">
          <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Kontak Kami</h1>
          </div>
        </div>
      </header>
      <section class="py-5 text-break">
        <div class="container px-4 px-lg-5 mt-5">
          <div class="row justify-content-center">
            <div class="col-lg-10 m-auto">
              <!-- Section-->
              @if (session('flash'))
              <div class="alert alert-success" role="alert">
                {{ session('flash') }}
              </div>
              @endif
              <div class="contact-form">

                <form action="{{ route('send.email') }}" method="POST">
                @csrf
                  <div class="row">
                    <div class="col-lg-6 col-md-6 mb-2">
                      <div class="name-input form-group">
                        <input
                          type="text"
                          class="form-control @error('name') is-invalid @enderror" name="name"
                          placeholder="Isikan nama lengkap"
                          value="{{ old('name') }}"
                        />
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mb-2">
                      <div class="email-input form-group">
                        <input
                          type="email"
                          class="form-control @error('email') is-invalid @enderror" name="email"
                          placeholder="Isikan alamat email"
                          value="{{ old('email') }}"
                        />
                        @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-6 mb-2">
                      <div class="subject-input form-group">
                        <input
                          type="text"
                          class="form-control @error('subject') is-invalid @enderror" name="subject"
                          placeholder="Isikan subject email"
                          value="{{ old('subject') }}"
                        />
                        @error('subject')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="message-input form-group mb-3">
                    <textarea
                      name="email_body"
                      cols="30"
                      rows="10"
                      placeholder="Isikan pesan anda"
                      class="form-control @error('email_body') is-invalid @enderror"
                      value="{{ old('email_body') }}"
                    ></textarea>
                    @error('email_body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="input-submit form-group">
                    <button
                      type="submit"
                      class="d-block btn btn-primary w-100"
                    >
                      Kirim Pesan
                    </button>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
