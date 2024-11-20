
<x-app-layout>
<link href="{{ asset('css/bootstrap5.min.css') }}" rel="stylesheet" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Location Detail') }}
            </h2>
    </x-slot>
      
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900">
                    <form action="{{ route('savelocationdata') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{ isset($location->id)  ? $location->id : ''  }}" hidden>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control  my-2" id="name" name="name" placeholder="name" value="{{ isset($location->name) ? $location->name :  old('name') }}">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="business_name" >Business Name</label>
                            <select class="form-control  my-2" name="business_name" id="business_name" >
                            <option value="{{ isset($location->business_name) ? $location->business_name :  old('email')  }}" Selected>Selected</option>
                                    @foreach($business as $busines)
                                    <option value="{{ $busines->name }}"  {{ isset($location->business_name) && $location->business_name == $busines->name ? 'selected' : '' }}>{{ $busines->name }}</option>
                                @endforeach
                            </select> 
                        </div>
                        @error('business_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control  my-2" id="exampleInputEmail1" name="email"  placeholder="Enter email" value="{{ isset($location->email) ? $location->email :  old('email')  }}">
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="address">address</label>
                            <input type="text" class="form-control my-2" id="address" name="address"  placeholder="Enter Adress" value="{{ isset($location->address) ? $location->address :  old('address')  }}">
                        </div>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror 
                        <button type="submit" class="btn btn-primary my-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
</x-app-layout>
