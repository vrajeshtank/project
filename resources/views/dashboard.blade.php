<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>   

   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900">         
                    <h2 class="my-3">Users Details</h2>
                    <hr>    
                    <table class="table table-striped">
                        <thead>
                            <tr>    
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            </tr>
                        </thead>                  
                        <tbody>
                            @if ($user->isNotEmpty())
                                @foreach ($user as $index => $Users)
                                    <tr>
                                        <td>{{ $index + 1 }}</td> 
                                        <td>{{ $Users->name }}</td> 
                                        <td>{{ $Users->email }}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3">No Data found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
