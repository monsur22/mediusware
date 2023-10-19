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
                                {{ __('Show all the deposited transactions') }}
                            </h2>
                            <div class="flex items-center justify-end mb-2">
                                <a href="{{ route('depositForm') }}" class="button-link">
                                    {{ __('Create Deposit') }}
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
                                    @foreach ($depositedTransactions as $depositedTransactions)
                                    <tr>
                                        <td>{{$depositedTransactions->id}}</td>
                                        <td>{{$depositedTransactions->user->name}}</td>
                                        <td>{{$depositedTransactions->transaction_type}}</td>
                                        <td>{{$depositedTransactions->amount}}</td>
                                        <td>{{$depositedTransactions->date}}</td>
                                      </tr>
                                    @endforeach
                                  </table>

                            </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>