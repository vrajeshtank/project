
<x-app-layout>
<link href="{{ asset('css/bootstrap5.min.css') }}" rel="stylesheet" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business Details') }}
            </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900">
                    <form action="{{ route('Addbusiness') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{ isset($business->id)  ? $business->id : ''  }}" hidden>
                        <div class="form-group">    
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control  my-2" id="logo" name="logo" accept=".jpg, .jpeg, .png"  onchange="previewImage(event)"> 
                            <div>
                                @if(isset($business->img))
                                    <img src="{{ asset('storage/'.$business->img) }}" alt="Current Logo" class="mt-2" id="logo-preview" style="max-height: 100px;">
                                @else
                                    <img id="logo-preview" style="max-height: 100px;">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control  my-2" id="name" name="name" placeholder="name" value="{{ isset($business->name) ? $business->name :  old('name') }}">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control  my-2" id="exampleInputEmail1" name="email"  placeholder="Enter email" value="{{ isset($business->email) ? $business->email :  old('email')  }}">
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="address">address</label>
                            <input type="text" class="form-control  my-2" id="address" name="address"  placeholder="Enter Adress" value="{{ isset($business->address) ? $business->address :  old('address')  }}">
                        </div>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary  my-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // image preview
        function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('logo-preview');   

            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
</x-app-layout>
