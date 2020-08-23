<div class="card-body">




    <label for="name">Name</label>
    <input name="name" value="{{ old('name',isset($user)?$user->name:null ) }}" class="form-control form-control-lg" type="text" placeholder="Enter Your Name">
    @error('name') <i class="text-danger">{{ $message }}</i> @enderror
    <br>

    <label for="email">Email</label>
    <input name="email" id="email" value="{{ old('email',isset($user)?$user->email:null ) }}" class="form-control form-control-lg" type="email" placeholder="Enter Your Password">
    @error('email') <i class="text-danger">{{ $message }}</i> @enderror
    <br>

    <label for="password">Password</label>
    <input name="password" id="password" " class="form-control form-control-lg" type="password" placeholder="Enter Your Email">
    @error('password') <i class="text-danger">{{ $message }}</i> @enderror
    <br>

    <label for="confirm_password">Confirm Password</label>
    <input name="password_confirmaiton" id="confirm_password" class="form-control form-control-lg" type="password" placeholder="Confirm Password">
    @error('password') <i class="text-danger">{{ $message }}</i> @enderror
    <br>


    <label for="phone">Phone</label>
    <input name="phone" id="phone" value="{{ old('phone',isset($user)?$user->phone:null ) }}" class="form-control form-control-lg" type="phone" placeholder="Enter Your Phone">
    @error('phone') <i class="text-danger">{{ $message }}</i> @enderror
    <br>

    <label for="address">Address</label>
    <textarea name="address" id="adderess" cols="30" rows="10" class="form-control">{{ old('address',isset($user)?$user->address:null ) }}</textarea>

    @error('address') <i class="text-danger">{{ $message }}</i> @enderror
    <br>

    <label for="status">Status</label>
    @error('status') <i class="text-danger">{{ $message }}</i>@enderror
    <div class="form-check">
        <label for="Active">Active&nbsp;</label>
        <input type="radio" name="status" class="form-check-inline" value="Active"
               @if(old('status',isset($user)?$user->status:null ) == "Active") checked @endif >
        <label for="Inactive">Inactive &nbsp;</label>
        <input type="radio" name="status" class="form-check-inline" value="Inactive"
               @if(old('status',isset($user)?$user->status:null ) == "Inactive") checked @endif >
    </div>

    <button type="submit">Submit</button>


</div>
