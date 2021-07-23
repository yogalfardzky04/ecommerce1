<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction Detail List') }}
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
                                <th>Transaction ID</th>
                                <th>Cart ID</th>
                                <th>Product ID</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaction_detail as $td)
                            <tr>
                                <td>{{ $td->id }}</td>
                                <td>{{ $td->transaction_id }}</td>
                                <td>{{ $td->cart_id }}</td>
                                <td>{{ $td->product_id }}</td>
                                <td>{{ $td->quantity }}</td>
                                <td>{{ $td->price }}</td>
                                <td>{{ $td->description }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
