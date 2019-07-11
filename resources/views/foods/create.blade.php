@extends('foods.layout')
<style>
@section('style')
.jumbtoron-extend{
    display: none;
}
span{
    color: red;
    font-size:1.3vw;
}

.container{
    background-color: #eaeaea;
}

.star{
    font-size:1px;
    height: 20px;
}

.check{
    font-size:1.5vw;
}

@endsection
</style>
@section('pan')
Post
@endsection


@section('comment')
お気軽に、思い出や感想を投稿しましょう。　
@endsection

@section('sub_title')
投稿の新規作成
@endsection

@section('content')
<div class="container">

         <form method="POST" action="{{ route('foods.store') }}" enctype="multipart/form-data">
            @csrf
            <fieldset class="mb-4 ml-2">
             <div style="font-size:2vw; padding-top: 40px;" class="mt-1 form-group">
                <label for="title">タイトル<span>※必須</span></label>
                <input
                    id="title"
                    name="title"
                    class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                    value="{{ old('title') }}"
                    type="text">
                    @if ($errors->has('title'))
                 <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                </div>
                    @endif
            </div>

                <div style="font-size:2vw;" class="mt-2 form-group">
                    <label for="menu">メニュー<span>※必須</span></label>
                    <input
                        id="menu"
                        name="menu"
                        class="form-control {{ $errors->has('menu') ? 'is-invalid' : '' }}"
                        value="{{ old('menu') }}"
                        type="text"
                        >
                        @if ($errors->has('menu'))
                        <div class="invalid-feedback">
                            {{ $errors->first('menu') }}
                        </div>
                        @endif
                </div>

                <div style="font-size:2vw;" class="mt-2 form-group">
                    <label for="store_name">店舗名<span>※必須</span></label>
                    <input
                        id="store_name"
                        name="store_name"
                        class="form-control {{ $errors->has('store_name') ? 'is-invalid' : '' }}"
                        value="{{ old('store_name') }}"
                        type="text"
                        >
                        @if ($errors->has('store_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('store_name') }}
                        </div>
                        @endif
                </div>


                <div class="form-group mt-2">
                    <label style="font-size:1.5vw; for="file1">メインイメージ</label>
                    <input 
                        type="file" 
                        id="image_url" 
                        name="image_url"
                        style="font-size:1.5vw;" 
                        class="form-control-file {{ $errors->has('image_url') ? 'is-invalid' : '' }}" 
                        value="{{ old('image_url') }}"
                        >
                         @if ($errors->has('image_url'))
                        <div style="color: red;">
                            {{ $errors->first('image_url') }}
                        </div>
                        @endif
                </div>

               
                <div style="font-size:1.5vw;" class="mt-2 form-group">
                <label style="margin-bottom: 1vh; font-size:2vw;" for="evaluation">評価<span>※必須</span></label><br>

                <select class="star"  name="evaluation" id="evaluation">
                    <option  value="5">★★★★★</option>
                    <option  value="4">★★★★</option>
                    <option  value="3">★★★</option>
                    <option  value="2">★★</option>
                    <option  value="1">★</option>
                </select>

                    @if ($errors->has('evaluation'))
                    <div style="color:red;">
                        {{ $errors->first('evaluation') }}
                    </div>
                    @endif
                </div>            

                <div style="font-size:2vw;" class="mt-4 form-group">
                    <label for="body">本文<span>※必須</span></label>
                    <textarea id="body" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4">{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                </div>

                <div style="font-size:2vw;" class="mt-2 form-group">
                <label for="address">住所</label>
                <input
                    id="address"
                    name="address"
                    class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                    value="{{ old('address') }}"
                    type="address"
                    >
                    @if ($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                    @endif
                </div>

                <div style="font-size:2vw;" class="mt-2 form-group">
                    <label for="phone_number">電話番号</label>
                    <input
                        id="phone_number"
                        name="phone_number"
                        class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                        value="{{ old('phone_number') }}"
                        type="text"
                        >
                        @if ($errors->has('phone_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone_number') }}
                        </div>
                        @endif
                </div>

                <div style="font-size:2vw;" class="mt-2 form-group">
                    <label for="holiday">休日</label>
                    <input
                        id="holiday"
                        name="holiday"
                        class="form-control {{ $errors->has('holiday') ? 'is-invalid' : '' }}"
                        value="{{ old('holiday') }}"
                        type="text"
                        >
                        @if ($errors->has('holiday'))
                        <div class="invalid-feedback">
                            {{ $errors->first('holiday') }}
                        </div>
                        @endif
                </div>

                <div style="font-size:2vw;" class="mt-2 form-group">
                    <label for="open">営業時間</label>
                    <input
                        id="open"
                        name="open"
                        class="form-control {{ $errors->has('open') ? 'is-invalid' : '' }}"
                        value="{{ old('open') }}"
                        type="text"
                        >
                        @if ($errors->has('open'))
                        <div class="invalid-feedback">
                            {{ $errors->first('open') }}
                        </div>
                        @endif
                </div>


            <div style="font-size:2vw;" class="mt-2 form-group">
                <label style="float: left;width: 100%;" for="open">ジャンル</label>   
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="モーニング" >&nbsp;&nbsp; モーニング
                 </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="ランチ" >&nbsp;&nbsp; ランチ
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="ディナー" >&nbsp;&nbsp; ディナー
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="和食" >&nbsp;&nbsp; 和食
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="洋食" >&nbsp;&nbsp; 洋食
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="中華" >&nbsp;&nbsp; 中華
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="アジア/エスニック/無国籍" >&nbsp;&nbsp; 和食
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="カフェ" >&nbsp;&nbsp; カフェ
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="ファーストフード" >&nbsp;&nbsp; ファーストフード
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="ファミレス" >&nbsp;&nbsp; ファミレス
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="和食居酒屋" >&nbsp;&nbsp; 和食居酒屋
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="洋食居酒屋" >&nbsp;&nbsp; 洋食居酒屋
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="アジア/エスニック/無国籍居酒屋" >&nbsp;&nbsp; アジア/エスニック
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="ダイニングバー/ビアガーデン" >&nbsp;&nbsp; ダイニングバー/ビアガーデン
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="ラーメン屋" >&nbsp;&nbsp; ラーメン屋
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="郷土料理" >&nbsp;&nbsp; 郷土料理
                </div>
                <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
                    <input id="genre" name="genre[]" type="checkbox" value="その他" >&nbsp;&nbsp; その他
                </div>
            </div>
            
                <div style="clear: both; class="mt-4">
                    <button style=" margin-top:40px;  margin-bottom: 30px;" type="submit" class="btn btn-primary">&nbsp;投稿&nbsp;</button>
                </div>
                </fieldset>
            </form>
    </div>
@endsection