@extends('../Layout.app')
@section('content')
<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
	<h2 class="text-lg font-medium leading-6 text-gray-900">Overview</h2>
	<div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

		<div class="overflow-hidden rounded-lg bg-white shadow">
			<div class="p-5">
				<div class="flex items-center">
					<div class="ml-5 w-0 flex-1">
						<dl>
							<dt class="truncate text-sm font-medium text-gray-500">Total Projects</dt>
							<dd>
								<div class="text-lg font-medium text-gray-900">3,065</div>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>

		<div class="overflow-hidden rounded-lg bg-white shadow">
			<div class="p-5">
				<div class="flex items-center">
					<div class="ml-5 w-0 flex-1">
						<dl>
							<dt class="truncate text-sm font-medium text-gray-500">Total Tasks</dt>
							<dd>
								<div class="text-lg font-medium text-gray-900">30</div>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="overflow-hidden bg-white shadow sm:rounded-lg mt-8">
		<div class="px-4 py-5 sm:px-6">
			<h3 class="text-base font-semibold leading-6 text-gray-900">Time Log Stats</h3>
			<p class="mt-1 max-w-2xl text-sm text-gray-500">Stats about the time spent on tasks..</p>
		</div>
		<div class="border-t border-gray-200 px-4 py-5 sm:p-0">
			<canvas class="p-5" id="myChart"></canvas>
		</div>
	</div>

</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	const ctx = document.getElementById('myChart');

	const DATA_COUNT = 7;
	const NUMBER_CFG = {
		count: DATA_COUNT,
		min: -100,
		max: 100
	};

	const labels = ['Jan', 'Feb', 'Mar'];
	const data = {
		labels: labels,
		datasets: [{
			label: 'Dataset 1',
			data: [10, 4, 40],
			borderWidth: 1
		}]
	};

	new Chart(ctx, {
		type: 'line',
		data: data,
		options: {
			responsive: true,
			scales: {
				y: {
					beginAtZero: true
				}
			},
			plugins: {
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Chart.js Line Chart'
				}
			}
		},
	});
</script>
@endsection