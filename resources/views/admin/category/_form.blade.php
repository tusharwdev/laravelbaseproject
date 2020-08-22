<div class="card-body">


        <label for="name">Name</label>
        @error('name') <i class="text-danger">{{ $message }}</i> @enderror
        <input name="name" value="{{ old('name',isset($category)?$category->name:null ) }}" class="form-control form-control-lg" type="text" placeholder="Enter Category Name">
        <br>

        <label for="description">Description</label>
        <textarea name="description"  class="form-control" type="text" placeholder="Enter Category Description ">
                                {{ old('name',isset($category)?$category->description:null ) }}
                            </textarea>

        <br>

        <label for="status">Status</label>
        @error('status') <i class="text-danger">{{ $message }}</i>@enderror
        <div class="form-check">
            <label for="Active">Active&nbsp;</label>
            <input type="radio" name="status" class="form-check-inline" value="Active"
                   @if(old('status',isset($category)?$category->status:null ) == "Active") checked @endif >
            <label for="Inactive">Inactive &nbsp;</label>
            <input type="radio" name="status" class="form-check-inline" value="Inactive"
                   @if(old('status',isset($category)?$category->status:null ) == "Inactive") checked @endif >
        </div>

        <button type="submit">Submit</button>


</div>
