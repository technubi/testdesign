<table class="table table-bordered">
    <thead>
    <tr>
        <td>Nama</td>
        <td>Owner</td>
        <td>Alamat</td>
        <td>Pilihan</td>
    </tr>
    </thead>
    <tbody>
    @foreach($dataTempat as $data)
    <tr>
        <td>{{$data->nama}}</td>
        <td>{{$data->nama}}</td>
        <td>{{$data->alamat}}</td>

        <td>
            <a href="{{URL::to('admin/tempat/detail/'.$data->id) }}">
                <button class="btn btn-info">Detail</button>
            </a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>