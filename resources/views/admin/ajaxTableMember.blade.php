<table class="table-bordered table">
                        <thead>
                            <tr>
                                <td>Nama</td>
                                <td>Alamat</td>
                                <td>No Telp</td>
                                <td>Poin</td>
                                <td>Status</td>
                                <td>Option</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($member as $data)
                                <tr>
                                    <td>{{$data->first_name}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>{{$data->notelp}}</td>
                                    <td>0</td>
                                    @if($data->pending == 0)
                                    <td class="text-pending">Pending</td>
                                        <td>
                                        <button class="btn btn-success btn-aprove" id="{{$data->id}}">Aprove</button>
                                        <button class="btn btn-warning btn-del" id="{{$data->id}}">Delete</button>

                                    </td>
                                    @elseif($data->pending == 1)
                                        <td class="text-pending">Non Active</td>
                                        <td>
                                        <button class="btn btn-success btn-activate" id="{{$data->id}}">Activate</button>
                                        <button class="btn btn-warning btn-del" id="{{$data->id}}">Delete</button>

                                    </td>
                                    @elseif($data->pending == 2)
                                        <td class="text-pending">Active</td>
                                        <td>
                                        <button class="btn btn-danger btn-deactive" id="{{$data->id}}">Deactivate</button>
                                        <button class="btn btn-warning btn-del" id="{{$data->id}}">Delete</button>

                                    </td>
                                    @endif

                                </tr>

                            @endforeach

                        </tbody>
                    </table>