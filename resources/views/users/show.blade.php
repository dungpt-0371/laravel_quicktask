<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('tasks.create', ['user' => $user->id]) }}">
                <x-primary-button class="mt-4 mb-4">
                    {{__('Create')}}
                </x-primary-button>
            </a>
            <Table class="table">
                <thead>
                    <tr>
                        <th class="text-gray-900 dark:text-gray-100 text-center" scope="col">#</th>
                        <th class="text-gray-900 dark:text-gray-100 text-center" scope="col">{{ __('Content')}}</th>
                        <th class="text-gray-900 dark:text-gray-100 text-center" scope="col">{{ __('Created At')}}</th>
                        <th class="text-gray-900 dark:text-gray-100 text-center" scope="col">{{ __('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->tasks as $index => $task)
                    <tr>
                        <th class="text-gray-900 dark:text-gray-100 text-center" scope="col">{{++$index}}</th>
                        <td class="text-gray-900 dark:text-gray-100 text-center">{{ $task->content }}</td>
                        <td class="text-gray-900 dark:text-gray-100 text-center">{{ $task->created_at }}</td>
                        <td class="text-gray-900 dark:text-gray-100 text-center">

                            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">
                                <x-primary-button>
                                    {{ __('Edit') }}
                                </x-primary-button>
                            </a>
                            <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <x-primary-button>
                                    {{ __('Delete') }}
                                </x-primary-button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </Table>
        </div>
    </div>
</x-app-layout>
