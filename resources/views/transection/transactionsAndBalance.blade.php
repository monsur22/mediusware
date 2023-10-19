<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transection') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Transactions and Balance') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Current Balance:{{ __($currentBalance) }}
                            </p>
                        </header>
                            <div>
                                <h2>Transaction: </h2>
                                <ul>
                                    {{-- @foreach ($transactions as $transaction)
                                        <li>{{ $transaction->transaction_type }}: {{ $transaction->amount }}</li>
                                    @endforeach --}}
                                    <table>
                                        <tr>
                                          <th>ID</th>
                                          <th>User Name</th>
                                          <th>Transection Type</th>
                                          <th>Amount</th>
                                          <th>Date</th>
                                        </tr>
                                        @foreach ($transactions as $transactions)
                                        <tr>
                                            <td>{{$transactions->id}}</td>
                                            <td>{{$transactions->user->name}}</td>
                                            <td>{{$transactions->transaction_type}}</td>
                                            <td>{{$transactions->amount}}</td>
                                            <td>{{$transactions->date}}</td>
                                          </tr>
                                        @endforeach
                                    </table>
                                </ul>
                            </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

{{-- @endsection --}}
</x-app-layout>