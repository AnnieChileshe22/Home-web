@extends('layouts.app')

@section('content')
<style>
    .post-gallery{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;margin-top:28px}
    .post-gallery-button{padding:0;border:0;border-radius:8px;overflow:hidden;background:#edf2ed;cursor:zoom-in}
    .post-gallery-button img{display:block;width:100%;height:240px;object-fit:cover;transition:transform .2s ease}
    .post-gallery-button:hover img{transform:scale(1.025)}
    .image-viewer{position:fixed;inset:0;width:100vw;height:100vh;max-width:none;max-height:none;margin:0;padding:64px 76px;border:0;border-radius:0;box-sizing:border-box;overflow:hidden;align-items:center;justify-content:center;background:rgba(5,12,8,.98)}
    .image-viewer::backdrop{background:rgba(5,12,8,.98)}
    .image-viewer[open]{display:flex}
    .image-viewer img{max-width:100%;max-height:calc(100vh - 100px);object-fit:contain;user-select:none;-webkit-user-drag:none}
    .image-viewer-close,.image-viewer-nav{position:absolute;display:grid;place-items:center;border:1px solid #ffffff55;border-radius:50%;background:#ffffff15;color:#fff;cursor:pointer;transition:background .15s ease}
    .image-viewer-close:hover,.image-viewer-nav:hover{background:#ffffff30}
    .image-viewer-close{top:20px;right:24px;width:46px;height:46px;font-size:28px;line-height:1}
    .image-viewer-nav{top:50%;width:48px;height:48px;transform:translateY(-50%);font-size:27px}
    .image-viewer-prev{left:20px}.image-viewer-next{right:20px}
    .image-viewer-count{position:absolute;bottom:22px;left:50%;transform:translateX(-50%);color:#fff;font-size:13px;font-variant-numeric:tabular-nums}
    @media(max-width:600px){.image-viewer{padding:58px 16px}.image-viewer img{max-height:calc(100vh - 120px)}.image-viewer-nav{width:42px;height:42px;background:#0008}.image-viewer-prev{left:10px}.image-viewer-next{right:10px}.image-viewer-close{top:12px;right:12px;width:42px;height:42px}}
</style>
<main class="page-width" style="padding:48px 0 72px;max-width:900px">
    <p class="eyebrow"><a href="{{ route('posts.index', ['category' => $post->category]) }}">{{ ucfirst($post->category) }}</a> · {{ $post->created_at->format('M j, Y') }}</p>
    <h1>{{ $post->title }}</h1>
    <article class="post-body">{!! $post->body !!}</article>
    @if ($post->images->isNotEmpty())
        <div class="post-gallery" aria-label="Post images">
            @foreach ($post->images as $image)
                <button class="post-gallery-button" type="button" data-view-image aria-label="View image {{ $loop->iteration }} full screen">
                    <img src="{{ Storage::disk('public')->url($image->path) }}" alt="{{ $image->alt_text ?: $post->title }}" data-full-image="{{ Storage::disk('public')->url($image->path) }}">
                </button>
            @endforeach
        </div>
    @endif
</main>
<dialog class="image-viewer" id="image-viewer" aria-label="Post image viewer">
    <button class="image-viewer-close" type="button" aria-label="Close image viewer">&times;</button>
    <button class="image-viewer-nav image-viewer-prev" type="button" aria-label="Previous image">&#8249;</button>
    <img id="image-viewer-current" src="" alt="">
    <button class="image-viewer-nav image-viewer-next" type="button" aria-label="Next image">&#8250;</button>
    <span class="image-viewer-count" aria-live="polite"></span>
</dialog>
<style>.post-body img{max-width:100%;height:auto}.post-body{overflow-wrap:anywhere}</style>
<script>
    (() => {
        const viewer = document.querySelector('#image-viewer');
        const currentImage = document.querySelector('#image-viewer-current');
        const counter = viewer.querySelector('.image-viewer-count');
        const buttons = [...document.querySelectorAll('[data-view-image]')];
        const images = buttons.map(button => button.querySelector('img'));
        let activeIndex = 0;
        let touchStartX = null;

        function showImage(index) {
            activeIndex = (index + images.length) % images.length;
            const image = images[activeIndex];
            currentImage.src = image.dataset.fullImage;
            currentImage.alt = image.alt;
            counter.textContent = `${activeIndex + 1} / ${images.length}`;
            const multiple = images.length > 1;
            viewer.querySelector('.image-viewer-nav').hidden = !multiple;
            viewer.querySelector('.image-viewer-next').hidden = !multiple;
        }

        buttons.forEach((button, index) => button.addEventListener('click', () => {
            showImage(index);
            viewer.showModal();
        }));
        viewer.querySelector('.image-viewer-close').addEventListener('click', () => viewer.close());
        viewer.querySelector('.image-viewer-prev').addEventListener('click', () => showImage(activeIndex - 1));
        viewer.querySelector('.image-viewer-next').addEventListener('click', () => showImage(activeIndex + 1));
        viewer.addEventListener('click', event => { if (event.target === viewer) viewer.close(); });
        viewer.addEventListener('keydown', event => {
            if (event.key === 'ArrowLeft' && images.length > 1) showImage(activeIndex - 1);
            if (event.key === 'ArrowRight' && images.length > 1) showImage(activeIndex + 1);
        });
        viewer.addEventListener('touchstart', event => { touchStartX = event.changedTouches[0].clientX; }, { passive: true });
        viewer.addEventListener('touchend', event => {
            if (touchStartX === null || images.length < 2) return;
            const distance = event.changedTouches[0].clientX - touchStartX;
            if (Math.abs(distance) > 45) showImage(activeIndex + (distance < 0 ? 1 : -1));
            touchStartX = null;
        }, { passive: true });
    })();
</script>
@endsection
