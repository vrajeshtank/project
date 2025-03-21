<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Location Details') }}
        </h2>
    </x-slot>
    <div id="errorMessage">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900">
                    <div class="d-flex justify-content-between align-items-center">
                    <h2  class="my-3" >Location Details</h2>
                    <a href="{{ route('locationform') }}" class="btn btn-primary" > add + </a>
                    </div><hr>
                    <table class="table table-striped" action="">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">business name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Created User</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($Location->isNotEmpty())
                                @foreach($Location as $index => $locations)
                                <tr>
                                    <td style="width: 50px;">{{ $index+1 }}</td>
                                    <td style="width: 100px;">{{ $locations->name }}</td>
                                    <td style="width: 130px;">{{ $locations->business_name }}</td>
                                    <td style="width: 150px;">{{ $locations->email }}</td>
                                    <td style="width: 160px;">{{ $locations->address }}</td>
                                    <td style="width: 100px;">{{ $locations->created_user }}</td>
                                    <td style="width: 150px;">
                                        <a href="{{ route('locationform' ,[ 'id' => $locations->id ] ) }}" class="btn btn-success">Edit</a>
                                        
                                        <a href="{{ route('deletelocationdata' , [ 'id' => $locations->id ] ) }}" onclick="return confirmDelete();" class="btn btn-danger my-2" >Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">No Data found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?"); 
        }
    </script>
</x-app-layout>
