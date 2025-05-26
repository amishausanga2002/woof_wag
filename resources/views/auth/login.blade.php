<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WoofWag</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-image: url('/images/hero.jpg'); /* Update this path if needed */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
            z-index: 0;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center text-white">
    <form method="POST" action="{{ route('login') }}"
    class="bg-white/10 backdrop-blur-md px-8 py-10 rounded-2xl w-full max-w-md shadow-2xl border border-white/20">
  @csrf

  <!-- Heading -->
  <h2 class="text-4xl font-extrabold mb-6 text-center text-white tracking-wide">Log in to WoofWag</h2>

  <!-- Email Address -->
  <div class="mb-5">
      <label for="email" class="block mb-2 text-white font-semibold">Email</label>
      <x-text-input id="email"
                    class="block w-full px-4 py-2 rounded-lg bg-white/80 text-black placeholder-gray-600 focus:ring-2 focus:ring-white"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    placeholder="Enter your email" />
      <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
  </div>

  <!-- Password -->
  <div class="mb-6">
      <label for="password" class="block mb-2 text-white font-semibold">Password</label>
      <x-text-input id="password"
                    class="block w-full px-4 py-2 rounded-lg bg-white/80 text-black placeholder-gray-600 focus:ring-2 focus:ring-white"
                    type="password" name="password" required autocomplete="current-password"
                    placeholder="Enter your password" />
      <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
  </div>

  <!-- Submit Button -->
  <div class="flex justify-center">
      <x-primary-button
          class="bg-white text-black hover:bg-gray-100 transition duration-200 font-bold text-lg px-6 py-2.5 rounded-lg shadow-md">
          {{ __('Log in') }}
      </x-primary-button>
  </div>

  <!-- Optional: Register or Forgot Password Links -->
  <div class="mt-6 text-center text-sm text-white/80">
      Don't have an account?
      <a href="{{ route('register') }}" class="text-white underline hover:text-gray-200">Register here</a>
  </div>
</form>


</body>
</html>
