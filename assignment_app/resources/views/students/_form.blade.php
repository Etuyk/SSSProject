<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input 
        type="text" 
        name="name" 
        id="name" 
        value="{{ old('name', $student->name ?? '') }}" 
        class="form-control" 
        required
    >
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input 
        type="email" 
        name="email" 
        id="email" 
        value="{{ old('email', $student->email ?? '') }}" 
        class="form-control" 
        required
    >
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input 
        type="text" 
        name="phone" 
        id="phone" 
        value="{{ old('phone', $student->phone ?? '') }}" 
        class="form-control" 
        required
    >
</div>

<div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input 
        type="date" 
        name="dob" 
        id="dob" 
        value="{{ old('dob', $student->dob ?? '') }}" 
        class="form-control" 
        required
    >
</div>

<div class="mb-3">
    <label for="college_id" class="form-label">College</label>
    <select name="college_id" id="college_id" class="form-select" required>
        <option value="">Select a college</option>
        @foreach($colleges as $id => $name)
            <option 
                value="{{ $id }}" 
                {{ old('college_id', $student->college_id ?? '') == $id ? 'selected' : '' }}
            >
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-success">Save</button>
<a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
