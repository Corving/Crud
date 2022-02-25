@extends("layouts.master")

@section("contenu")

    <div class="mt-4">
        <div class="d-flex justify-content-between mb-2">
            {{$posts->links()}}
            <div><a href="{{route('posts.create')}}" class="btn btn-primary">Ajouter un nouveau Post</a></div>
        </div>

        @if(session()->has("successDelete"))
            <div class="alerte alert-success">
                <h3>{{session()->get('successDelete')}}</h3>
            </div>
        @endif

        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">slug</th>
                <th scope="col">excerpt</th>
                <th scope="col">category_id</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->content}}</td>
                    <td>{{$post->slug}}</td>
                    <td>{{$post->excerpt}}</td>

                    <td>{{$post->category->libelle}}</td>
                    <td>
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-info">Editer</a>
                        <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer ce post ?')){document.getElementById('form-{{$post->id}}').submit() }">Supprimer</a>


                        <form id="form-{{$post->id}}" action="{{route('posts.supprimer',['posts'=>$post->id])}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
