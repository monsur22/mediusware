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
                                {{ __('Show all the withdraw transactions') }}
                            </h2>
                            <div class="flex items-center justify-end mb-2">
                                <a href="{{ route('withdrawForm') }}" class="button-link">
                                    {{ __('Create Withdraw') }}
                                </a>
                            </div>

                        </header>
                            <div>
                                <table>
                                    <tr>
                                      <th>ID</th>
                                      <th>User Name</th>
                                      <th>Transection Type</th>
                                      <th>Amount</th>
                                      <th>Date</th>
                                    </tr>
                                    @foreach ($withdrawTransactions as $withdrawTransactions)
                                    <tr>
                                        <td>{{$withdrawTransactions->id}}</td>
                                        <td>{{$withdrawTransactions->user->name}}</td>
                                        <td>{{$withdrawTransactions->transaction_type}}</td>
                                        <td>{{$withdrawTransactions->amount}}</td>
                                        <td>{{$withdrawTransactions->date}}</td>
                                      </tr>
                                    @endforeach
                                </table>

                            </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

{{-- @endsection --}}
</x-app-layout>