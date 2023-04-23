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

                    @if (auth()->user()->role_id == 1)
                        <div class="text-2xl font-bold text-neutral-600">
                            {{ __('Resived Aplication') }}
                        </div>


                        <!-- component -->
                        <!-- This is an example component -->
                        @foreach ($applications as $application)
                            <div class='mt-5'>
                                <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                                    <div class="flex w-full items-center justify-between border-b pb-3">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]">
                                            </div>
                                            <div class="text-lg font-bold text-slate-700">{{ $application->user->name }}
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-8">
                                            <button
                                                class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">id:
                                                {{ $application->id }}
                                                2</button>
                                            <div class="text-xs text-neutral-500">{{ $application->created_at }}</div>
                                        </div>
                                    </div>

                                    <div class="flex justify-between">
                                        <div>
                                            <div class="mt-4 mb-3">
                                                <div class="mb-3 text-xl font-bold">{{ $application->subject }}</div>
                                                <div class="text-sm text-neutral-600">{{ $application->message }}</div>
                                            </div>

                                            <div class="flex items-center justify-between text-slate-500">
                                                {{ $application->user->email }}

                                            </div>
                                        </div>



                                        <div>
                                            <div class="border rounded cursor-pointer m-6 p-6 hover:bg-gray-100">
                                                <a href="{{ asset('storage/' . $application->file_url) }}"
                                                    target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($application->answer()->exists())
                                        
                                  <hr class="border">
                                  <h3 class="mt-4 text-zinc-600 text-xl" >Answer:</h3>
                                  <p> {{ $application->answer->body }}</p>
                               @else
                               <div class="flex justify-end">

                                <a href="{{ route('answer.create',$application->id) }}" class="border  border-green-500 bg-green-500 text-white rounded-md px-2 py-1 m-1 mr-6 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                                    Answer
                                </a>
                            </div>
                                @endif

                                </div>

                         
                            </div>
                        @endforeach
                        <div class="flex items-center justify-right   mt-4 ">
                            {{ $applications->links() }}
                        </div>
                </div>
            @else
                <!-- component -->
                <div class='flex items-center justify-center '>

                    <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                        @if (Session::has('message'))
                            <div class="relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg"
                                role="alert">
                                <p>{{ Session::get('message') }}</p>

                            </div>
                        @endif
                        <div class='max-w-md mx-auto space-y-6'>



                            <form action="{{ route('applications.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <h2 class="text-2xl font-bold ">Submit your application</h2>

                                <hr class="my-6">
                                <label class="uppercase text-sm font-bold opacity-70">Subject</label>
                                <input type="text" name="subject" required
                                    class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">


                                <label class="uppercase text-sm font-bold opacity-70">Message</label>
                                <textarea name="message" required cols="30" rows="5"
                                    class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none"></textarea>


                                <label class="uppercase text-sm font-bold opacity-70">File upload</label>
                                <input type="file" name="file" required
                                    class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">

                                <input type="submit"
                                    class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded" value="Send">
                            </form>

                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
