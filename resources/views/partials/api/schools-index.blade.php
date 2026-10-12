@foreach ($schools as $school)
                    @php
                        $thumbnail = $school['thumbnail'] ?? null;
                        $imageUrl = asset('images/Mukuba-Hero.jpg');

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
                        <div class="school-image">
                            <img src="{{ $imageUrl }}" alt="{{ $school['name'] }}">
                        </div>
                        <div class="school-content">
                            <span class="school-tag">{{ $school['code'] }}</span>
                            <h2>{{ $school['name'] }}</h2>
                            <p>{!! Str::limit($school['description'], 100, '...') !!}</p>
                            <a href="{{ route('schools.show', $school['id']) }}">Learn more</a>
                        </div>
                    </article>
                  @endforeach