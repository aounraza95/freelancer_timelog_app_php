@extends('../Layout.app')
@section('content')

<div class="sm:block">
	<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
		<div class="sm:flex sm:items-center">
			<div class="sm:flex-auto">
				<h1 class="text-xl font-semibold leading-6 text-gray-900">Tasks List</h1>
				<p class="mt-2 text-sm text-gray-700">A list of all tasks.</p>
			</div>
			<div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
				<a type="button" href="/tasks/create" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">+ Add Task</a>
			</div>
		</div>
		<div class="mt-8 flex flex-col">
			<div class="min-w-full overflow-hidden overflow-x-auto align-middle shadow sm:rounded-lg">
				<table class="min-w-full divide-y divide-gray-200">
					<thead>
						<tr>
							<th class="bg-gray-50 px-6 py-3 text-left text-sm font-semibold text-gray-900" scope="col">Task Id</th>
							<th class="bg-gray-50 px-6 py-3 text-left text-sm font-semibold text-gray-900" scope="col">Task Name</th>
							<th class="bg-gray-50 px-6 py-3 text-left text-sm font-semibold text-gray-900 md:block" scope="col">Status</th>
							<th class="bg-gray-50 px-6 py-3 text-right text-sm font-semibold text-gray-900" scope="col">Last udpated</th>
							<th class="bg-gray-50 px-6 py-3 text-center text-sm font-semibold text-gray-900" scope="col">Actions</th>
						</tr>
					</thead>
					<tbody class="divide-y divide-gray-200 bg-white">
						@if(count($taskslist))
						@foreach($taskslist as $task)
						<tr class="bg-white">
							<td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
								{{ $task['id'] }}
							</td>
							<td class="whitespace-nowrap px-6 py-4 text-left text-sm text-gray-500">
								{{ $task['task_name'] }}
							</td>
							<td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500 md:block">
								<span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium bg-green-100 text-green-800 capitalize">{{ $task['status'] }}</span>
							</td>
							<td class="whitespace-nowrap px-6 py-4 text-right text-sm text-gray-500">
								<time datetime="2020-07-11">{{ $task['updated_at'] }}</time>
							</td>
							<td class="whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-0">
								<a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
								<a href="#" class="ml-2 text-red-600 hover:text-indigo-900">Delete</a>
							</td>
						</tr>
						@endforeach
						@else
						<tr class="bg-white">
							<td colspan="" class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
								No tasks found.
							</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection