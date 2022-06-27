<x-guest-layout>
    @section('title', 'Edit Halaman')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <form action="{{ route('dashboard.pages.update', $page->id) }}" method="POST">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ $page->id }}">

        <div class="card w-full bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Edit {{ $page->title }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Judul</span>
                        </label>
                        <input name="title" type="text" value="{{ old('title', $page->title) }}"
                               class="input input-bordered w-full"/>
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Slug</span>
                        </label>
                        <input name="slug" type="text" value="{{ old('slug', $page->slug) }}"
                               class="input input-bordered w-full"/>
                    </div>
                </div>

                <div class="form-control w-full">
                    <textarea id="summernote" name="body" class="textarea textarea-bordered h-60">
                        {!! old('body', $page->content) !!}
                    </textarea>
                </div>

                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Perbarui</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 240,
            });
        });
    </script>
</x-guest-layout>
