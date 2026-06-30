<div class="mb-3">
    <label for="name" class="form-label">Organization Name <span class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $organization->name ?? '') }}" placeholder="e.g. Student Council" />
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="acronym" class="form-label">Acronym</label>
    <input type="text" name="acronym" class="form-control @error('acronym') is-invalid @enderror" id="acronym" value="{{ old('acronym', $organization->acronym ?? '') }}" placeholder="e.g. SC" />
    @error('acronym')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror   
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
        <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
            <option value="" disabled {{ old('category', $organization->category ?? '') == '' ? 'selected' : '' }}>Select a category</option>
            <option value="Academic" {{ old('category', $organization->category ?? '') == 'Academic' ? 'selected' : '' }}>Academic</option>
            <option value="Religious" {{ old('category', $organization->category ?? '') == 'Religious' ? 'selected' : '' }}>Religious</option>
            <option value="Sports" {{ old('category', $organization->category ?? '') == 'Sports' ? 'selected' : '' }}>Sports</option>
            <option value="Cultural" {{ old('category', $organization->category ?? '') == 'Cultural' ? 'selected' : '' }}>Cultural</option>
        </select>
        @error('category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
            <option value="Active" {{ old('status', $organization->status ?? 'Active') == 'Active' ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ old('status', $organization->status ?? '') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label for="adviser_id" class="form-label">Adviser</label>
        <select name="adviser_id" id="adviser_id" class="form-select @error('adviser_id') is-invalid @enderror">
            <option value="">No Adviser Selected</option>
            @foreach($faculties as $faculty)
                <option value="{{ $faculty->id }}" {{ old('adviser_id', $organization->adviser_id ?? '') == $faculty->id ? 'selected' : '' }}>
                    {{ $faculty->name }}
                </option>
            @endforeach
        </select>
        @error('adviser_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Brief description of the organization">{{ old('description', $organization->description ?? '') }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>