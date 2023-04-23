<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <!-- component -->
                    <div class='flex items-center justify-center '>

                        <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>

                            <div class='max-w-md mx-auto space-y-6'>



                                <form action="{{ route('answer.store',$application->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <h2 class="text-2xl font-bold ">Answer application ID: {{ $application->id }}</h2>

                                    <hr class="my-6">


                                    <label class="uppercase text-sm font-bold opacity-70">Answer</label>
                                    <textarea name="body" required cols="30" rows="5"class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none"></textarea>



                                    <input type="submit" class="py-2 px-6 bg-emerald-500 text-white font-medium rounded" value="Submit">
                                    <a href="{{ route('dashboard') }}" class="py-2.5 px-6  bg-green-500 text-white font-medium rounded">Cansel</a>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>