@extends('../welcome')
<div class="min-h-full">

	<!-- Static sidebar for desktop -->
	<div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col">
		<!-- Sidebar component, swap this element with another sidebar if you like -->
		<div class="flex flex-grow flex-col overflow-y-auto bg-cyan-700 pb-4 pt-5">
			<nav class="mt-5 flex flex-1 flex-col divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
				<div class="space-y-1 px-2">
					<a href="/dashboard" class="text-white hover:bg-cyan-600 hover:text-white group flex items-center rounded-md px-2 py-2 text-sm font-medium leading-6">
						Dashboard
					</a>
					<a href="/projects" class="text-cyan-100 hover:bg-cyan-600 hover:text-white group flex items-center rounded-md px-2 py-2 text-sm font-medium leading-6">
						Projects
					</a>
					<a href="/tasks" class="text-cyan-100 hover:bg-cyan-600 hover:text-white group flex items-center rounded-md px-2 py-2 text-sm font-medium leading-6">
						Tasks
					</a>
					<a href="/timelog" class="text-cyan-100 hover:bg-cyan-600 hover:text-white group flex items-center rounded-md px-2 py-2 text-sm font-medium leading-6">
						Timelogs
					</a>
				</div>
			</nav>
		</div>
	</div>

	<div class="flex flex-1 flex-col lg:pl-64">
		<main class="flex-1 pb-8">
			<!-- Page header -->
			<div class="bg-white shadow">
				<div class="px-4 sm:px-6 lg:mx-auto lg:max-w-6xl lg:px-8">
					<div class="py-6 md:flex md:items-center md:justify-between lg:border-gray-200">
						<div class="min-w-0 flex-1">
							<!-- Profile -->
							<div class="flex items-center">
								<h1 class=" text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:leading-9">Hello, Welcome again.</h1>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="mt-8">
				@yield('content')
			</div>
		</main>
	</div>
</div>