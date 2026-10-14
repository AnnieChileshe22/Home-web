@csrf
<label style="display:block;margin:18px 0">Title
    <input name="title" value="{{ old('title', $post->title ?? '') }}" required maxlength="100" style="display:block;width:100%;padding:10px">
</label>
<label style="display:block;margin:18px 0">Category
    <select name="category" required style="display:block;padding:10px">
        @foreach (\App\Models\Posts::CATEGORIES as $category)
            <option value="{{ $category }}" @selected(old('category', $post->category ?? request('category', 'news')) === $category)>{{ ucfirst($category) }}</option>
        @endforeach
    </select>
</label>
<label style="display:block;margin:18px 0">Body
    <textarea id="post-body" name="body" required>{{ old('body', $post->body ?? '') }}</textarea>
</label>
<label style="display:block;margin:18px 0">Add images (JPG, PNG or WebP; up to 15 MB each, 10 per submission)
    <input type="file" name="images[]" accept="image/jpeg,image/png,image/webp" multiple>
</label>
@if (isset($post) && $post->images->isNotEmpty())
    <fieldset style="display:flex;gap:16px;flex-wrap:wrap;padding:16px">
        <legend>Current images (select any to remove)</legend>
        @foreach ($post->images as $image)
            <label style="width:150px"><img src="{{ Storage::disk('public')->url($image->path) }}" alt="" style="width:100%;height:100px;object-fit:cover"><br>
                <input type="checkbox" name="remove_images[]" value="{{ $image->id }}"> Remove
            </label>
        @endforeach
    </fieldset>
@endif
@if ($errors->any())
    <div role="alert" style="color:#a00"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
@endif
<button type="submit">Save post</button>
<a href="{{ route('admin.posts.index') }}">Cancel</a>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js" referrerpolicy="no-referrer"></script>
<script>
    ClassicEditor.create(document.querySelector('#post-body'), {
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo']
    }).catch(error => console.error(error));
</script>
