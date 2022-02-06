<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-violet-300 border-b border-violet-200 ">
                    @if(auth()->user())

                        <div class="grid gap-8 space-x-5 lg:grid-cols-2 p-12 px-10">
                            <div class="flex flex-col items-center pb-8">
                                {{---todo temp img now need to implement profile picture ofc.--}}
                                <img class="mb-3 w-24 h-24 rounded-full shadow-lg" src="{{asset('img/mona.png')}}"
                                     alt="Ico_img"/>
                                <h3 class="mb-1 text-xl font-medium text-gray-900 ">Username: {{$user->username}}</h3>
                                <p class="mb-1 text-md font-medium text-gray-900 ">First Name: {{$user->first_name}}</p>
                                <p class="mb-1 text-md font-medium text-gray-900 ">Email: {{$user->email}}</p>
                                <p class="mb-1 text-md font-medium text-gray-900 ">Adventure
                                    Rank: {{$user->adventure_rank}}</p>


                            </div>

                            <div class="flex flex-col mt-5 pb-8">

                                <a href="{{route('p:edit-profile', [$user->id])}}" class="text-center rounded-full bg-emerald-600 hover:bg-emerald-700 font-bold py-2 px-4">
                                    Edit</a>

                                <button
                                    class="rounded-full bg-rose-500 hover:bg-rose-700 font-bold py-2 px-4 mt-5">
                                    Remove
                                </button>

                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


