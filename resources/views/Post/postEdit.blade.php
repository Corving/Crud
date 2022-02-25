@extends("layouts.master")

@section("contenu")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Ajout d'un nouveau Post</h3>


        <div class="mt-4">
            @if(session()->has("success"))
                <div class="alerte alert-success">
                    <h3>{{session()->get('success')}}</h3>
                </div>
            @endif


            <form style="width:65%" method="post" action="">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" value="{{$posts->title}}" class="form-control" name="title" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">content</label>
                    <input type="text" value="{{$posts->content}}" class="form-control" name="content" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">slug</label>
                    <input type="text" value="{{$posts->slug}}" class="form-control" name="slug">
                </div>
                <div class="mb-3">
                    <label class="form-label">Excerpt</label>
                    <input type="text" value="{{$posts->excerpt}}" class="form-control" name="excerpt">
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label></br>
                    <select name="category_id" required>
                        @foreach($categories as $category)
                            @if($category->id == $posts->category_id)
                                <option name="category_id" value="{{$category->id}}" selected>{{$category->libelle}}</option>
                            @else
                                <option name="category_id" value="{{$category->id}}">{{$category->libelle}}</option>
                            @endif

                        @endforeach
                    </select>

                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{route('posts')}}" class="btn btn-warning">Retour</a>

            </form>
        </div>
    </div>

@endsection
