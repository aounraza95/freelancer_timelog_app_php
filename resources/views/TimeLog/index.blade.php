@extends('../Layout.app')
@section('content')

<div class="sm:block">
	<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
		<div class="sm:flex sm:items-center">
			<div class="sm:flex-auto">
				<h1 class="text-xl font-semibold leading-6 text-gray-900">Timelog List</h1>
				<p class="mt-2 text-sm text-gray-700">A list of all timelogs.</p>
			</div>
			<div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
				<a type="button" href="/timelog/create" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">+ Add Timelog</a>
			</div>
		</div>
		<div class="mt-8 flex flex-col">
			<div class="min-w-full overflow-hidden overflow-x-auto align-middle shadow sm:rounded-lg">
				<table class="min-w-full divide-y divide-gray-200">
					<thead>
						<tr>
							<th class="bg-gray-50 px-6 py-3 text-left text-sm font-semibold text-gray-900" scope="col">Timelog Id</th>
							<th class="bg-gray-50 px-6 py-3 text-left text-sm font-semibold text-gray-900" scope="col">Task</th>
							<th class="bg-gray-50 px-6 py-3 text-left text-sm font-semibold text-gray-900" scope="col">Status</th>
							<th class="bg-gray-50 px-6 py-3 text-left text-sm font-semibold text-gray-900" scope="col">Start Time</th>
							<th class="bg-gray-50 px-6 py-3 text-left text-sm font-semibold text-gray-900" scope="col">End Time</th>
							<th class="bg-gray-50 px-6 py-3 text-right text-sm font-semibold text-gray-900" scope="col">Last udpated</th>
							<th class="bg-gray-50 px-6 py-3 text-center text-sm font-semibold text-gray-900" scope="col">Actions</th>
						</tr>
					</thead>
					<tbody class="divide-y divide-gray-200 bg-white">
						@if(count($timeloglist))
						@foreach($timeloglist as $timelog)
						<tr class="bg-white">
							<td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
								{{ $timelog['id'] }}
							</td>
							<td class="whitespace-nowrap px-6 py-4 text-left text-sm text-gray-500">
								{{ $timelog['tasks']->task_name }}
							</td>
							<td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500 md:block">
								<span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium bg-green-100 text-green-800 capitalize">{{ (!$timelog['end_datetime'] ? 'Active' : 'Closed')  }}</span>
							</td>
							<td class="whitespace-nowrap px-6 py-4 text-left text-sm text-gray-500">
								<time datetime="2020-07-11">{{ $timelog['start_datetime'] }}</time>
							</td>
							<td class="whitespace-nowrap px-6 py-4 text-left text-sm text-gray-500">
								<time datetime="2020-07-11">{{ $timelog['end_datetime'] }}</time>
							</td>
							<td class="whitespace-nowrap px-6 py-4 text-right text-sm text-gray-500">
								<time datetime="2020-07-11">{{ $timelog['updated_at'] }}</time>
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
								No timelog found.
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