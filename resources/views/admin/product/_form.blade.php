<div class="card-body">


    <label for="category_id">Select Category</label>
    <select name="category_id" id="category_id" class="form-control">
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option @if(old('category_id',isset($product) ? $product->category_id:null) == $category->id ) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id') <i class="text-danger">{{ $message }}</i> @enderror


    <label for="name">Name</label>
    <input name="name" value="{{ old('name',isset($product)?$product->name:null ) }}" class="form-control form-control-lg" type="text" placeholder="Enter Product Name">
    @error('name') <i class="text-danger">{{ $message }}</i> @enderror
    <br>

    <label for="description">Description</label>
    <textarea name="description"  class="form-control" type="text" placeholder="Enter Product Description ">
      {{ old('description',isset($product)?$product->description:null ) }}
     </textarea>

    <br>

    <label for="color">Color</label>
    <input name="color" value="{{ old('color',isset($product)?$product->color:null ) }}" class="form-control form-control-lg" type="text" placeholder="Enter Product color">
    @error('color') <i class="text-danger">{{ $message }}</i> @enderror
    <br>

    <label for="size">size</label>
    <input name="size" value="{{ old('size',isset($product)?$product->size:null ) }}" class="form-control form-control-lg" type="text" placeholder="Enter Product size">
    @error('size') <i class="text-danger">{{ $message }}</i> @enderror
    <br>

    <label for="price">price</label>
    <input name="price" value="{{ old('price',isset($product)?$product->price:null ) }}" class="form-control form-control-lg" type="number" placeholder="Enter Product price">
    @error('price') <i class="text-danger">{{ $message }}</i> @enderror
    <br>

    <label for="stock">stock</label>
    <input name="stock" value="{{ old('stock',isset($product)?$product->stock:null ) }}" class="form-control form-control-lg" type="number" placeholder="Enter Product stock">
    @error('stock') <i class="text-danger">{{ $message }}</i> @enderror
    <br>

    <label for="status">Status</label>
    @error('status') <i class="text-danger">{{ $message }}</i>@enderror
    <div class="form-check">
        <label for="Active">Active&nbsp;</label>
        <input type="radio" name="status" class="form-check-inline" value="Active"
               @if(old('status',isset($product)?$product->status:null ) == "Active") checked @endif >
        <label for="Inactive">Inactive &nbsp;</label>
        <input type="radio" name="status" class="form-check-inline" value="Inactive"
               @if(old('status',isset($product)?$product->status:null ) == "Inactive") checked @endif >
    </div>

    <label for="image">Image</label>
    <input name="image" class="form-control form-control-lg" type="file" placeholder="Upload Product Image">
    @error('image') <i class="text-danger">{{ $message }}</i> @enderror
    <br>

    <button type="submit">Submit</button>


</div>
