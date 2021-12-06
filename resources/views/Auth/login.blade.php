<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login Penggajian</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ mix('/js/app.js') }}"></script>
    </head>
    <body class="font-mono" style="
			background-image: url('images/gedung/gedung.jpeg');
			background-repeat:no-repeat;
			background-size:cover;
		">
		<!-- Container -->
		<div class="container h-screen mx-auto">
			<div class="flex justify-center items-center px-6  min-w-full min-h-full">
				<!-- Row -->
				<div class="w-full xl:w-3/4 lg:w-11/12 flex">
					<!-- Col -->
					<div
						class="w-full h-auto hidden lg:w-5/12 bg-cover rounded-l-lg bg-blue-500 lg:flex items-center justify-center shadow-md"
					>
						<div class="text-center">
							<img src="/images/logo/logo.png" alt="logo smp" class="w-48 h-48 bg-white p-2 rounded-full shadow-xl">
							<p class="font-semibold text-white mt-2">YAYASAN NURUL AMIN</p>
							<p class="font-semibold text-white text-xl">SMPIT BINA ADZKIA</p>
						</div>
					</div>
					<!-- Col -->
					<div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
						<h3 class="pt-4 text-2xl text-center">Login</h3>
						<form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="{{ route('login.post') }}" method="POST">
							<div class="my-2">
								@if (session("err"))
									<x-alert type="warning" message="{{ session('err') }}"></x-alert>
								@endif
							</div>
							@csrf
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="email">
									Email
								</label>
								<input
									class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none @error('email') border-red-600 @enderror focus:outline-none focus:shadow-outline"
									id="email"
									name="email"
									type="email"
									value="{{ old('email') }}"
									placeholder="Email"
								/>
								@error('email')
									<span class="text-red-600 text-xs">{{ $message }}</span>
								@enderror
							</div>
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="email">
									Password
								</label>
								<input
									class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline  @error('password') border-red-600 @enderror"
									id="password"
									name="password"
									type="password"
									placeholder="Password"
								/>
								@error('password')
									<span class="text-red-600 text-xs">{{ $message }}</span>
								@enderror
							</div>
							<div class="mb-6 text-center">
								<button type="submit"
									class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
									type="button"
								>
									Login
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>