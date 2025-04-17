<!-- filepath: c:\laragon\www\spk-hp-topsis\resources\views\admin\dashboard.blade.php -->
<x-admin-layout header="Dashboard Admin">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
        <p class="text-gray-600 mt-1">Selamat datang di panel admin PhoneMatch</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-200">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Total Handphone
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900">
                                    {{ \App\Models\Handphone::count() }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <div class="text-sm">
                    <a href="{{ route('admin.handphone.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Lihat semua
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-200">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Kriteria
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900">
                                    {{ \App\Models\Criteria::count() }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <div class="text-sm">
                    <a href="{{ route('admin.criteria.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Kelola kriteria
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-200">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Total Brand
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900">
                                    {{ \App\Models\Brand::count() }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <div class="text-sm">
                    <a href="{{ route('admin.brand.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Kelola brand
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-200">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Benefit/Cost
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900">
                                    {{ \App\Models\Criteria::where('type', 'benefit')->count() }}/{{ \App\Models\Criteria::where('type', 'cost')->count() }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <div class="text-sm">
                    <a href="{{ route('admin.criteria.create') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Tambah kriteria
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-200">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Sistem
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-lg font-semibold text-gray-900">
                                    TOPSIS
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <div class="text-sm">
                    <a href="{{ route('about.topsis') }}" class="font-medium text-indigo-600 hover:text-indigo-500" target="_blank">
                        Pelajari TOPSIS
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200 md:col-span-2">
            <h2 class="text-lg font-medium text-gray-900 mb-4">Kriteria Aktif</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Label</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                            <th scope="col" class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach(\App\Models\Criteria::all() as $criteria)
                            <tr>
                                <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">{{ $criteria->name }}</td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">{{ $criteria->label }}</td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                    @if($criteria->type == 'benefit')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Benefit
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Cost
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.criteria.edit', ['criterion' => $criteria->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
            <h2 class="text-lg font-medium text-gray-900 mb-4">Ringkasan Kategori Handphone</h2>
            <div class="space-y-4">
                @php
                    $premiumCount = \App\Models\Handphone::where('price', '>=', 8000000)->count();
                    $midCount = \App\Models\Handphone::whereBetween('price', [4000000, 8000000-1])->count();
                    $entryCount = \App\Models\Handphone::whereBetween('price', [2000000, 4000000-1])->count();
                    $budgetCount = \App\Models\Handphone::where('price', '<', 2000000)->count();
                    $total = \App\Models\Handphone::count() ?: 1; // prevent div by zero
                @endphp

                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm font-medium text-gray-700">Premium</span>
                        <span class="text-sm text-gray-500">{{ $premiumCount }} ({{ round(($premiumCount / $total) * 100) }}%)</span>
                    </div>
                    <div class="relative pt-1">
                        <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200">
                            <div style="width: {{ ($premiumCount / $total) * 100 }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500"></div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm font-medium text-gray-700">Mid-Range</span>
                        <span class="text-sm text-gray-500">{{ $midCount }} ({{ round(($midCount / $total) * 100) }}%)</span>
                    </div>
                    <div class="relative pt-1">
                        <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200">
                            <div style="width: {{ ($midCount / $total) * 100 }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm font-medium text-gray-700">Entry-Level</span>
                        <span class="text-sm text-gray-500">{{ $entryCount }} ({{ round(($entryCount / $total) * 100) }}%)</span>
                    </div>
                    <div class="relative pt-1">
                        <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200">
                            <div style="width: {{ ($entryCount / $total) * 100 }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm font-medium text-gray-700">Budget</span>
                        <span class="text-sm text-gray-500">{{ $budgetCount }} ({{ round(($budgetCount / $total) * 100) }}%)</span>
                    </div>
                    <div class="relative pt-1">
                        <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200">
                            <div style="width: {{ ($budgetCount / $total) * 100 }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-gray-200">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Tindakan Cepat</h3>
                <div class="grid grid-cols-2 gap-2">
                    <a href="{{ route('admin.handphone.create') }}" class="inline-flex justify-center items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Tambah HP
                    </a>
                    <a href="{{ route('admin.criteria.create') }}" class="inline-flex justify-center items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Tambah Kriteria
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
