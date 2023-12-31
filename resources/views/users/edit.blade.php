<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Edit') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-4">
                    <x-input-label for="task" :value="__('Name')" />

                    <x-text-input id="task" class="block mt-1 w-full" type="text" name="name" value="{{ $user->username }}" required autocomplete="name" />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <x-primary-button class="mt-4 mb-4">
                    {{__('Save')}}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
