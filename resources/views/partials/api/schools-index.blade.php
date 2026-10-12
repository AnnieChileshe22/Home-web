@foreach ($schools as $school)
                    @php
                        $thumbnail = trim($school['thumbnail'] ?? '');
                        $imageUrl = asset('images/library.jpg');

                        if ($thumbnail) {
                            if (Str::startsWith($thumbnail, ['http://', 'https://', '//'])) {
                                $imageUrl = $thumbnail;
                            } else {
                                $path = ltrim($thumbnail, '/');
                                $imageUrl = rtrim(config('services.ecms.base_url'), '/') . '/'
                                    . (Str::startsWith($path, 'storage/') ? $path : 'storage/' . $path);
                            }
                        }
                    @endphp
                    <article style="cursor: pointer;" onclick="window.location.href='{{ route('schools.show', $school['id']) }}'" class="school-card">
                            <img src="{{ $imageUrl }}" alt="{{ $school['name'] }}" @if ($loop->first) fetchpriority="high" @else loading="lazy" @endif>
                            <h3>{{ $school['name'] }}</h3>
                            <a href="{{ route('schools.show', $school['id']) }}">Learn more</a>
                    </article>
                  @endforeach