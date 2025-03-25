<div class="mb-3">
    <label for="name" class="form-label">College Name</label>
    <input type="text" name="name" id="name" 
           value="{{ old('name', $college->name ?? '') }}" 
           class="form-control" required>
  </div>
  
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" id="address" 
           value="{{ old('address', $college->address ?? '') }}" 
           class="form-control" required>
  </div>
  
  <button type="submit" class="btn btn-success">Save</button>
  <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Cancel</a>
  