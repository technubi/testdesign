    <table class="table table-bordered">
                <thead>
                    <tr>
                        <td style="width: 10%">Nama</td>
                        <td style="width: 10%">Owner</td>
                        <td style="width: 40%">Alamat</td>
                        <td>Pilihan</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataOwner as $data)
                     <tr>
                        <td>{{$data->first_name}}</td>
                        <td>{{$data->notelp}}</td>
                        <td>{{$data->alamat}}</td>

                        <td>
                            <a href="{{URL::to('admin/owner/detail/'.$data->id) }}">
                                <button class="btn btn-info">Detail</button>
                            </a>
                            <a href="{{URL::to('admin/owner/edit/'.$data->id) }}">
                               <button class="btn btn-info">Edit</button>
                            </a>
                            <a href="{{URL::to('admin/owner/delete/'.$data->id) }}">
                               <button class="btn btn-warning">Delete</button>
                            </a>

                        </td>
                     </tr>
                    @endforeach
                </tbody>
            </table>