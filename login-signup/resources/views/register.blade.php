<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/registrations/registration-9/assets/css/registration-9.css">
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css"
    rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<section class="bg-primary py-3 py-md-5 py-xl-8 vh-100  bg-image" style="background-image: url('https://img.freepik.com/free-vector/background-realistic-abstract-technology-particle_23-2148431735.jpg?w=996&t=st=1725118946~exp=1725119546~hmac=0decf04c10185d3a669693e60448f0b12af06ccc40cad3258510ddd8ad6f1457');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-12 ">
                    <div class="card border-0 rounded-4 w-75 " style="width: 550px; margin:auto;">
                        <div class="card-body p-3 p-md-4 p-xl-5 " >
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <h2 class="h3 text-center">Registration</h2>
                                            <h3 class="fs-6 fw-normal text-secondary m-0 text-center">Enter your details to register</h3>
                                        </div>
                                    </div>
                                </div>
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                               {{-- @if ($errors->any())
                                    <div>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif--}}
                                <form class="needs-validation" action="{{ route('registerPost') }}" method="POST" novalidate onsubmit="return validateForm(event)">
                                    @csrf
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="username" id="name" placeholder="Your Name" required value="{{ old('name') }}">
                                                <label for="name" class="form-label">Your Name</label>
                                                <div class="invalid-feedback">
                                                    Please provide your name.
                                                </div>
                                                @error('username')
                                                    <p style="    position: absolute;
                                                                    width: auto;
                                                                    margin-top: .25rem;
                                                                    font-size: .875rem;
                                                                    color: #dc4c64;">
                                                        {{ $message }}
                                                    </p>
                                                @enderror


                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                                                <label for="email" class="form-label">Email</label>
                                                <div class="invalid-feedback">
                                                    Please provide a valid email.
                                                </div>
                                                @error('email')
                                                <p style="    position: absolute;
                                                                    width: auto;
                                                                    margin-top: .25rem;
                                                                    font-size: .875rem;
                                                                    color: #dc4c64;">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required value="{{ old('password') }}">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="invalid-feedback">
                                                    Please provide a password.
                                                </div>
                                                @error('password')
                                                <p style="    position: absolute;
                                                                    width: auto;
                                                                    margin-top: .25rem;
                                                                    font-size: .875rem;
                                                                    color: #dc4c64;">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" name="iAgree" id="iAgree" required>
                                                <label class="form-check-label text-secondary" for="iAgree">
                                                    I agree to the <a href="#!" class="link-primary text-decoration-none">terms and conditions</a>
                                                </label>
                                                <div class="invalid-feedback">
                                                    You must agree before submitting.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                            <button class="btn btn-primary btn-lg gradient-custom-4" type="submit"><span>Sign up</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end mt-4">
                                        <p class="m-0 text-secondary text-center">Already have an account? <a href="#!" class="link-primary text-decoration-none">Sign in</a></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
</div>

    </section>

    <script>
        function validateForm(event) {
            const form = event.target;
            if (form.checkValidity()) {
                form.classList.add('was-validated');
                return true;  // Allow form submission
            } else {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
                return false;  // Prevent form submission
            }
        }


    </script>
</body>
</html>
