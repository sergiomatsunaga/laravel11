@if (session()->has('success'))
    <div class="bg-green-100 border border-green-400">
        {{session('success')}}
    </div>
@endif

@if (session()->has('message'))
    <div class="bg-green-100 border border-green-400">
        {{session('message')}}
    </div>
@endif

@if (session()->has('error'))
    <div class="bg-red-100 border border-red-400">
        {{session('error')}}
    </div>
@endif

@if($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <div class="bg-red-100 border border-red-400">
        {{$error}}
    </div>
    @endforeach
</ul>
@endif