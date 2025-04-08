<x-admin-layout header="Handphone Management">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 md:mb-0">
                <i class="fas fa-mobile-alt text-indigo-600 mr-2"></i> Handphone List
            </h2>
            <div class="flex flex-col sm:flex-row gap-3">
                <form method="GET" action="{{ route('admin.handphone.index') }}">
                    <div class="flex">
                        <input type="text" name="search" placeholder="Search handphones..." class="border rounded-l p-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-300" value="{{ request('search') }}">
                        <button type="submit" class="bg-indigo-600 text-white p-2 rounded-r hover:bg-indigo-700 transition">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <a href="{{ route('admin.handphone.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition inline-flex items-center justify-center">
                    <i class="fas fa-plus mr-2"></i> Add Handphone
                </a>
            </div>
        </div>

        @if($handphones->isEmpty())
            <div class="text-center py-8">
                <div class="text-gray-400 mb-3">
                    <i class="fas fa-mobile-alt text-4xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-500">No handphones found</h3>
                <p class="text-gray-500">Try a different search or add a new handphone.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 text-sm uppercase">
                            <th class="py-3 px-4 text-left">
                                <a href="{{ route('admin.handphone.index', ['sort' => 'name', 'direction' => request('sort') === 'name' && request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}" class="flex items-center">
                                    Name
                                    @if(request('sort') === 'name')
                                        <i class="fas fa-sort-{{ request('direction') === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1 opacity-30"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="py-3 px-4 text-left">
                                <a href="{{ route('admin.handphone.index', ['sort' => 'price', 'direction' => request('sort') === 'price' && request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}" class="flex items-center">
                                    Price
                                    @if(request('sort') === 'price')
                                        <i class="fas fa-sort-{{ request('direction') === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1 opacity-30"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="py-3 px-4 text-left">
                                <a href="{{ route('admin.handphone.index', ['sort' => 'camera', 'direction' => request('sort') === 'camera' && request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}" class="flex items-center">
                                    Camera
                                    @if(request('sort') === 'camera')
                                        <i class="fas fa-sort-{{ request('direction') === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1 opacity-30"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="py-3 px-4 text-left">
                                <a href="{{ route('admin.handphone.index', ['sort' => 'battery', 'direction' => request('sort') === 'battery' && request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}" class="flex items-center">
                                    Battery
                                    @if(request('sort') === 'battery')
                                        <i class="fas fa-sort-{{ request('direction') === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1 opacity-30"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="py-3 px-4 text-left">
                                <a href="{{ route('admin.handphone.index', ['sort' => 'ram', 'direction' => request('sort') === 'ram' && request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}" class="flex items-center">
                                    RAM
                                    @if(request('sort') === 'ram')
                                        <i class="fas fa-sort-{{ request('direction') === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1 opacity-30"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="py-3 px-4 text-left">Category</th>
                            <th class="py-3 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        @foreach($handphones as $handphone)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0 mr-3">
                                            @if($handphone->specification && $handphone->specification->image)
                                                <img src="{{ $handphone->specification->image }}" alt="{{ $handphone->name }}" class="h-10 w-10 rounded-full object-cover">
                                            @else
                                                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <i class="fas fa-mobile-alt text-gray-400"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="font-medium">{{ $handphone->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $handphone->specification ? $handphone->specification->processor_name : 'N/A' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4">Rp{{ number_format($handphone->price, 0, ',', '.') }}</td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $handphone->camera >= 8 ? 'bg-green-100 text-green-800' : ($handphone->camera >= 6 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                        {{ $handphone->camera }} / 10
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $handphone->battery >= 8 ? 'bg-green-100 text-green-800' : ($handphone->battery >= 6 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                        {{ $handphone->battery }} / 10
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $handphone->ram >= 8 ? 'bg-green-100 text-green-800' : ($handphone->ram >= 6 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                        {{ $handphone->ram }} / 10
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        {{ $handphone->category === 'Premium' ? 'bg-purple-100 text-purple-800' :
                                           ($handphone->category === 'Mid-range' ? 'bg-blue-100 text-blue-800' :
                                           ($handphone->category === 'Entry-level' ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800'))
                                        }}">
                                        {{ $handphone->category }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('admin.handphone.edit', $handphone->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-700 transition">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="{{ route('admin.handphone.show', $handphone->id) }}" class="bg-gray-600 text-white px-3 py-1 rounded-md text-sm hover:bg-gray-700 transition">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <form action="{{ route('admin.handphone.destroy', $handphone->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this handphone?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md text-sm hover:bg-red-700 transition">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $handphones->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
