@extends('layouts.main')

@section('content')
	<!-- Start Actor Info -->
	<div class="actor-info border-b border-gray-800">
		<div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
			<div class="flex-none">
				<img src="https://image.tmdb.org/t/p/w300/lldeQ91GwIVff43JBrpdbAAeYWj.jpg" alt="Jason Statham" class="w-64 lg:w-96">
				<ul class="flex items-center mt-4">
					<li>
						<a href="#" title="Facebook">
							<svg class="fill-current text-gray-400 hover:text-white w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
						</a>
					</li>
					<li>
						<a href="#" title="Instagram">
							<svg class="fill-current text-gray-400 hover:text-white w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zM17.5 6.5h.01"/></svg>
						</a>
					</li>
					<li>
						<a href="#" title="Twitter">
							<svg class="fill-current text-gray-400 hover:text-white w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
						</a>
					</li>
				</ul>
			</div>

			<div class="md:ml-24">
				<h2 class="text-4xl font-semibold">Jason Statham</h2>
				<div class="flex flex-wrap items-center text-gray-400 text-sm">
					<span>
						<svg class="fill-current text-gray-400 hover:text-white w-4"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
					</span>
					<span class="ml-2">Feb 9, 1987(37 years old) in Toronto, Canada</span>
				</div>

				<p class="text-gray-300 mt-8">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quae totam molestias repudiandae saepe
					veritatis quasi sit animi optio quas necessitatibus, culpa ab vero itaque temporibus quaerat ipsam tempore
					ullam inventore ducimus distinctio voluptates enim incidunt? Ex, eaque? Optio, soluta.
				</p>
				<h4 class="font-semibold mt-12">Known For</h4>
			</div>
		</div>
	</div>
	<!-- End Actor Info -->

	<!-- Start Credits -->
	<div class="credits border-b border-gray-800">
		<div class="container mx-auto px-4 py-16">
			<h2 class="text-4xl font-semibold">Credits</h2>
		</div>
	</div>
	<!-- End Credits -->
@endsection
