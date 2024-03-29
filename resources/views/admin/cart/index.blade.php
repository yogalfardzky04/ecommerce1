<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->user_id }}</td>
                                <td>{{ $c->product_id }}</td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->quantity }}</td>
                                <td>{{ $c->description }}</td>
                                <td>{{ $c->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
