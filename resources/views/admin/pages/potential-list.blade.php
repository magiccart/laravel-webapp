@extends('admin.layout.index')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
                Protentials
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="dataTable1" width="100%"
                                       class="table table-striped table-lightfont dataTable" role="grid"
                                       aria-describedby="dataTable1_info" style="width: 100%;">
                                    <thead>
                                    <tr role="row">
                                      <th class="sorting_asc" tabindex="0" aria-controls="dataTable1"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 251px;">Potential ID
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable1"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending"
                                            style="width: 251px;">Name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 378px;">Email
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 182px;">Effective System Size
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 87px;">Status
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                            colspan="1"
                                            aria-label="Start date: activate to sort column ascending"
                                            style="width: 170px;">Detail
                                        </th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <tr>
                                            <th rowspan="1" colspan="1">Potential ID</th>
                                            <th rowspan="1" colspan="1">Name</th>
                                            <th rowspan="1" colspan="1">Email</th>
                                            <th rowspan="1" colspan="1">Effective System Size</th>
                                            <th rowspan="1" colspan="1">Status</th>
                                            <th rowspan="1" colspan="1">Detail</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr role="row" class="odd">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->system_size}}</td>
                                            @if($item->status==1)
                                            <td>Negotiation/Review</td>
                                            @elseif($item->status==2)
                                            <td>Closed Won</td>
                                            @elseif($item->status==3)
                                            <td>Closed Lost</td>
                                            @elseif($item->status==4)
                                            <td>Closed Lost to Competition</td>
                                            @endif
                                        <td><a href="./detail-potentials/{{$item->id}}"><button class="btn btn-primary">Detail</button></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection