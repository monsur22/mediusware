<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Diposit Form') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Create withdraw') }}
                            </h2>


                        </header>
                            <div>
                                <form method="post" action="{{ route('withdraw') }}" class="mt-6 space-y-6">
                                    @csrf

                                    <div>
                                        <x-input-label for="amount" :value="__('Amount')" />
                                        <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" value="0" required autocomplete="amount" />
                                        <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                                    </div>


                                    <div class="flex items-center gap-4">
                                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                                    </div>
                                </form>
                                {{-- <form method="POST" action="{{ route('deposit') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="amount">Amount:</label>
                                        <input type="number" id="amount" name="amount" required>
                                    </div>

                                    <button type="submit">Deposit</button>
                                </form> --}}
                            </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

{{-- @endsection --}}
</x-app-layout>