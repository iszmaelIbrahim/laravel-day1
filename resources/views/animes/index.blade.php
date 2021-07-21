
<h3> senarai Anime </h3>

<ul>
    @foreach ($animes as $anime)
        <li>{{$anime->nama}} Episod: {{$anime->episod}}, {{$anime->tahun}}</li> 
        <button type="button" >Comment</button>
        <br>
    @endforeach
</ul>

<form method="POST" action="/animes">
    @csrf

    Nama Anime: <input type="text" name="nama">
    episod: <input type="number" name="episod">
    tahun: <input type="number" name="tahun">

    <input type="hidden" name="studio_id" value=1>

    <button type="submit">Submit</button>
</form>