<section aria-labelledby="hostel-form-title">
    <div class="page-heading">
        <div><p class="eyebrow">Student housing</p><h1 id="hostel-form-title">{{ $hostel->exists ? 'Edit hostel' : 'Add a hostel' }}</h1><p class="page-description">Manage the hostel details, facilities, price and photo gallery.</p></div>
        <a class="button button-secondary" href="{{ route('admin.hostels.index') }}">Back to hostels</a>
    </div>
    @if ($errors->any())<div class="success-box" role="alert">Please review the highlighted fields and try again.</div>@endif
    <form class="admin-panel" method="POST" action="{{ $hostel->exists ? route('admin.hostels.update', $hostel) : route('admin.hostels.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($hostel->exists) @method('PUT') @endif
        <div class="form-grid">
            <label class="form-field"><span>Hostel name <b>*</b></span><input name="name" required maxlength="50" value="{{ old('name', $hostel->name) }}">@error('name')<small role="alert">{{ $message }}</small>@enderror</label>
            <label class="form-field"><span>Hostel type <b>*</b></span><select name="gender" required>@foreach (['female' => 'Female', 'male' => 'Male', 'combined' => 'Combined'] as $value => $label)<option value="{{ $value }}" @selected(old('gender', $hostel->gender) === $value)>{{ $label }}</option>@endforeach</select>@error('gender')<small role="alert">{{ $message }}</small>@enderror</label>
            <label class="form-field"><span>Price per semester (ZMW) <b>*</b></span><input name="price" type="number" min="0" step="0.01" required value="{{ old('price', $hostel->price) }}">@error('price')<small role="alert">{{ $message }}</small>@enderror</label>
        </div>
        <label class="form-field"><span>Description</span><textarea name="description" rows="5" maxlength="10000">{{ old('description', $hostel->description) }}</textarea>@error('description')<small role="alert">{{ $message }}</small>@enderror</label>
        @php($selectedFeatures = old('features', $hostel->features ?? []))
        <fieldset class="form-field"><legend>Features <b>*</b></legend><div class="form-grid">
            @php($features = ['Wi-Fi', 'Laundry Room', 'Water', 'Study Area', 'Security', 'Common Room', 'Power', 'Housekeeping'])
            @foreach ($features as $feature)<label><input type="checkbox" name="features[]" value="{{ $feature }}" @checked(in_array($feature, $selectedFeatures, true))> {{ $feature }}</label>@endforeach
            @foreach (array_diff($selectedFeatures, $features) as $customFeature)<label><input type="checkbox" name="features[]" value="{{ $customFeature }}" checked> {{ $customFeature }}</label>@endforeach
        </div><label class="form-field"><span>Other feature</span><input name="custom_feature" maxlength="80" placeholder="Add another feature">@error('features')<small role="alert">{{ $message }}</small>@enderror @error('features.*')<small role="alert">{{ $message }}</small>@enderror</label></fieldset>
        <label class="form-field"><span>Add photos</span><input type="file" name="images[]" accept="image/jpeg,image/png,image/webp" multiple>@error('images')<small role="alert">{{ $message }}</small>@enderror @error('images.*')<small role="alert">{{ $message }}</small>@enderror<small>Up to 20 JPG, PNG or WebP photos, 15 MB each.</small></label>
        @if ($hostel->exists && $hostel->images->isNotEmpty())<fieldset class="form-field"><legend>Current photos</legend><div class="form-grid">@foreach ($hostel->images as $image)<label><img src="{{ Storage::disk('public')->url($image->path) }}" alt="" style="width:120px;height:90px;object-fit:cover"><br><input type="checkbox" name="remove_images[]" value="{{ $image->id }}"> Remove</label>@endforeach</div></fieldset>@endif
        <div style="display:flex;gap:12px"><button class="button button-primary" type="submit">{{ $hostel->exists ? 'Save changes' : 'Create hostel' }}</button><a class="button button-secondary" href="{{ route('admin.hostels.index') }}">Cancel</a></div>
    </form>
</section>
