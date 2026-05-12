<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="row vh-100 justify-content-center align-items-center">

        <div class="col-md-4">

            <div class="card shadow" style="border-radius:0;">

                <!-- Header -->
                <div style="background:#f1f1f1; padding:12px;">
                    <h5 class="mb-0">Sign in</h5>
                </div>

                <div style="border-top:1px solid #ccc;"></div>

                <!-- Form -->
                <div class="p-4">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                           <label class="form-label">Username</label>
                           <input type="text"
                             name="username"
                             class="form-control"
                             style="border-radius:0;">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   style="border-radius:0;">
                        </div>

                        @error('password')
                          <div class="text-danger mt-2">
                              {{ $message }}
                          </div>
                        @enderror

                        <button class="btn btn-primary w-100" style="border-radius:0;">
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

</body>
</html>