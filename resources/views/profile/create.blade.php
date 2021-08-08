<x-front-layout>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h4 class="mt-5 px-5">Profile Setting</h4>
    <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container p-5">
        <div class="row form-row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="country">First Name</label><span style="color: red !important; display: inline; float: none;">*</span>      
                    <input type="text" name="first_name" value="{{ old('first-name',$profile->first_name) }}" class="form-control @error('first_name') is-invalid @enderror"  >
                    @error('first_name')
                     <p class='invalid-feedback'>{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="country">Last Name</label><span style="color: red !important; display: inline; float: none;">*</span>      
                    <input type="text" name="last_name" value="{{ old('last-name',$profile->last_name) }}" class="form-control @error('first_name') is-invalid @enderror" >
                    @error('last_name')
                    <p class='invalid-feedback'>{{$message}}</p>
                   @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6 mt-3">
                <div class="form-group">
                    <label>Avatar</label>
                    <div class="cal-icon">
                        <input type="file" name="avatar" class="form-control @error('avatar')is-invalid @enderror">
                        @error('avatar')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 mt-3">
                <div class="form-group">
                    <label for="country">Date of Birth</label><span style="color: red !important; display: inline; float: none;">*</span>
                    <div class="cal-icon">
                        <input type="date" name="birthday" value="{{ old('birthday',$profile->birthday) }}" class="form-control @error('birthday')is-invalid @enderror">
                        @error('birthday')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 mt-3">
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" name="mobile" value="{{ old('mobile',$profile->mobile)}}" class="form-control @error('mobile')is-invalid @enderror">
                    @error('mobile')
                        <p class="invalid-feedback">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6 mt-3">
                <div class="form-group">
                <label for="country">Country</label><span style="color: red !important; display: inline; float: none;">*</span>      
            <select name="country" class="form-control">
                <option value="">Select Country</option>
                 @foreach (Symfony\Component\Intl\Countries::getNames() as $code=>$name)
                <option value="{{ $code }}"{{-- @if($country->id == old('country',$country->id)) selected @endif --}}>{{$name}}</option>
                @endforeach 
            </select>
            @error('country')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6 mt-3">
                <div class="form-group">
                    <label for="country">Address</label>     
                    <input type="text" name="address" value="{{ old('address',$profile->address) }}" class="form-control @error('address')is-invalid @enderror">
                    @error('address')
                    <p class="invalid-feedback">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6 mt-3">
                <div class="form-group">
                    <label for="country">Zip Code</label><span style="color: red !important; display: inline; float: none;">*</span>      
                    <input type="text" name="zip_code" value="{{ old('zip_code',$profile->zip_code) }}" class="form-control @error('zip_code')is-invalid @enderror">
                    @error('zip_code')
                    <p class="invalid-feedback">{{$message}}</p>
                @enderror
                </div>
            </div>
        </div>
        <div class="form-group mt-3">
            <label for="">Gender:</label>
            <div>
                <label  class= "@error('status')is-invalid @enderror">
                <input type="radio" name="gender" value="male" @if (old('gender',$profile->gender) == 'male') checked @endif>
                    Male</label>
                <label>
                <input type="radio" name="gender" value="female" @if (old('gender',$profile->gender) == 'female') checked @endif>
                    Female</label>
                @error('gender')
                <p class="invalid-feedback ">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="py-5">
        <button type="submit" class="btn btn-primary btn-block">Save</button>
        </div>
        </div>
    </form>
</x-front-layout>