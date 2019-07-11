@extends('foods.layout')
<style>
@section('style')

.sub_title{
    margin-bottom: 20px;
}

#gallery{
    margin-bottom: 80px;
}


#gallery ul{
    list-style: none;
    margin: 0;
    padding: 0;
}

#gallery p{
    font-size:0.8vw;
    margin: 0;
    padding-bottom: 1.5vh;
}

#gallery ul li{
    width: 20%;
    margin: 5% 0 0 4%;
    border: solid 1px #ccc;
    float: left;
    text-align: center;
    color: #b71077;
    font-weight: bold;
    box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
    background-color: #fff;
}

#gallery img{
    width:100%;
    height:180px;
}

#gallery img:hover{
    opacity: 0.7;
}

@media (max-width: 1070px) {

#gallery ul li{
    width: 30%;
    margin: 5% 0 0 2.5%;
    border: solid 1px #ccc;
    float: left;
    text-align: center;
    color: #b71077;
    font-weight: bold;
    box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
}

#gallery img{
     width:100%;
     height:160px;
}
}

@media (max-width: 700px) {
    .images{
    
}

#gallery ul li{
    width: 40%;
    margin: 5% 0 0 6.3%;
    border: solid 1px #ccc;
    float: left;
    text-align: center;
    color: #b71077;
    font-weight: bold;
    box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
}

#gallery img{
     width:100%;
     height:160px;
}
}

@media (max-width: 480px) {

#gallery ul li{
    width: 90%;
    margin: 5% 0 30px 5%;
    border: solid 1px #ccc;
    float: left;
    text-align: center;
    color: #b71077;
    font-weight: bold;
    box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
}

#gallery img{
    border-radius: 3px;
     width:100%;
     height:250px;
}
}
.sub_title span{
    font-size:1.5vw;
}


@endsection
</style>
@section('pan')
Images
@endsection


@section('comment')
あなたの、今まで投稿した画像の一覧ページです。
@endsection

@section('sub_title')
投稿写真<span>&nbsp;&nbsp;&nbsp;&nbsp;({{$items->count()}}件)</span>
@endsection

@section('content')  
@section('content')
    <section id="gallery">
        <ul> 
        @foreach($posts as $post)
        @isset($post->image_url)
            <li><a href="{{ route('foods.show', $post->id) }}""><img src="{{$post->image_url}}" alt="{{$post->title}}"  ></a></li>
        @endisset
        @endforeach
        </ul>
     
    </section>
       <div style="clear: both;" class="mt-3 d-flex justify-content-center mb-5">
      {{ $posts->links() }}
    </div> 
@endsection
