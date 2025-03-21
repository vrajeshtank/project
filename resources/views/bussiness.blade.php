<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business Details') }}
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
                        <div class="d-flex justify-content-between  align-items-center ">
                            <h2  class="my-3" >Businesses Details</h2>
                            <a href="{{ route('editform') }}"class="btn btn-primary">add +</a>
                        </div>
                        <hr>
                        <table class="table table-striped" action="">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Adress</th>
                                    <th scope="col">Created User</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($business->isNotEmpty())
                                        @foreach ($business as $index => $busines)
                                        <tr>
                                            <td style="width: 50px;">{{ $index + 1 }}</td> 
                                            <td style="width: 100px;"><img src="{{ asset('storage/' .  $busines->img) }}" alt="logo Image" style="max-height: 100px;"></td> 
                                            <td style="width: 150px;">{{ $busines->name }}</td> 
                                            <td style="width: 200px;">{{ $busines->email }}</td> 
                                            <td style="width: 250px;">{{ $busines->address }}</td>
                                            <td style="width: 150px;">{{ $busines->created_user }}</td> 
                                            <td style="width: 250px;">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                                            data-name="{{ $busines->name }}" data-email="{{ $busines->email }}" data-address="{{ $busines->address }}" data-created_user="{{ $busines->created_user }}">view</button>
                                                <a class="btn btn-success" href="{{ route('editform' , [ 'id' => $busines->id ] ) }}">Edit</a>
                                                <a class="btn btn-danger my-2" onclick="return confirmDelete();"  href="{{  route('deletebussiness' , [ 'id' => $busines->id ] ) }}">Delete</a>
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

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Business Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p  class="my-2"><strong>Name: </strong><span id="modalName"></span></p>
        <p  class="my-2"><strong>Email: </strong><span id="modalEmail"></span></p>
        <p  class="my-2"><strong>Address: </strong><span id="modalAddress"></span></p>
        <p class="my-2"><strong>Created User: </strong><span id="created_user"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var name = button.data('name');
        var email = button.data('email');
        var address = button.data('address');
        var created_user = button.data('created_user');
        
        $('#modalName').text(name);
        $('#modalEmail').text(email);
        $('#modalAddress').text(address);
        $('#created_user').text(created_user);
        });
    });

   function confirmDelete() {
        return confirm("Are you sure you want to delete this record?"); 
    }
</script>
   
</x-app-layout>
