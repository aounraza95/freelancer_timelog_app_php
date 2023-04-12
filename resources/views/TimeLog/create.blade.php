@extends('../Layout.app')
@section('content')

<div class="min-h-full">
	<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
		@if($errors->any())
		<!-- Error Notification -->
		<div aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6">
			<div class="flex w-full flex-col items-center space-y-4 sm:items-end">
				<div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-red-900 shadow-lg ring-1 ring-black ring-opacity-5">
					<div class="p-4">
						<div class="flex items-center">
							<div class="flex w-0 flex-1 justify-between">
								<p class="w-0 flex-1 text-sm font-medium text-white">{{$errors->first()}}</p>
							</div>
							<div class="ml-4 flex flex-shrink-0">
								<button type="button" class="inline-flex rounded-md text-white bg-red-900 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
									<svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
										<path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
									</svg>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--  -->
		@endif

		@if (Session::has('msg'))
		<!-- Notification -->
		<div aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6">
			<div class="flex w-full flex-col items-center space-y-4 sm:items-end">
				<div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-green-900 shadow-lg ring-1 ring-black ring-opacity-5">
					<div class="p-4">
						<div class="flex items-center">
							<div class="flex w-0 flex-1 justify-between">
								<p class="w-0 flex-1 text-sm font-medium text-white">{{Session::get('msg')}}</p>
							</div>
							<div class="ml-4 flex flex-shrink-0">
								<button type="button" class="inline-flex rounded-md bg-green-900 text-white hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
									<svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
										<path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
									</svg>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--  -->
		@endif

		<div class="overflow-hidden bg-white shadow sm:rounded-lg">
			<div class="px-4 py-5 sm:px-6">
				<h3 class="text-xl font-semibold leading-6 text-gray-900">Create Task</h3>
				<p class="mt-1 max-w-2xl text-sm text-gray-500">Create new task here..</p>
			</div>
			<form action="/tasks/create/submit" method="POST">
				@csrf()
				<div class="border-t border-gray-200">
					<div class="p-5">
						<div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
							<div class="sm:col-span-3">
								<label for="task_name" class="block text-sm font-medium leading-6 text-gray-900">Task name</label>
								<div class="mt-2">
									<input type="text" name="task_name" id="task_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
								</div>
							</div>
							<div class="sm:col-span-6">
								<label for="project" class="block text-sm font-medium leading-6 text-gray-900">Project</label>
								<div class="mt-2">
									<select id="project" name="project" autocomplete="project" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
										@foreach($projectslist as $project)
										<option value="{{ $project['id'] }}">{{ $project['project_name'] }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="sm:col-span-6">
								<label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
								<div class="mt-2">
									<select id="status" name="status" autocomplete="status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
										<option value="active">Active</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<!--  -->
					<div class="p-6 flex items-center justify-end gap-x-6">
						<a href="/tasks" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
						<button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save Task</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


@endsection