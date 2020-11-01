@extends('admin.layout.index')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">
                    Data Tables
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
                                                style="width: 251px;">id
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
                                                style="width: 182px;">Phone
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 87px;">Yearly Electricity Usage in kWh
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                colspan="1"
                                                aria-label="Start date: activate to sort column ascending"
                                                style="width: 170px;">Visit date and time
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 161px;">Basic
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 161px;">Design
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 161px;">Payment Plan
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 161px;">Documents
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 161px;">Site Picture
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 161px;">Confirm
                                            </th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">id</th>
                                            <th rowspan="1" colspan="1">Name</th>
                                            <th rowspan="1" colspan="1">Email</th>
                                            <th rowspan="1" colspan="1">Phone</th>
                                            <th rowspan="1" colspan="1">Yearly Electricity Usage in kWh</th>
                                            <th rowspan="1" colspan="1">Visit date and time</th>
                                            <th rowspan="1" colspan="1">Basic</th>
                                            <th rowspan="1" colspan="1">Design</th>
                                            <th rowspan="1" colspan="1">Payment Plan</th> 
                                            <th rowspan="1" colspan="1">Documents</th>  
                                            <th rowspan="1" colspan="1">Site Picture</th>  
                                            <th rowspan="1" colspan="1">Confirm</th>  
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach ($data as $item)
                                        <tr role="row" class="odd">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->phone}}</td>
                                            @if($item->type_meu=='Month')
                                                <?php
                                                $kw = ($item->contact_meu)*12;
                                                ?>
                                                <td>{{$kw}} KW</td>
                                            @else
                                            <td>{{$item->contact_meu}}KW</td>
                                            @endif
                                            <?php
                                                $old_date = date($item->updated_at);
                                                $new_date = date('d/m/Y H:i A', strtotime($old_date));
                                            ?>
                                            <td>{{$new_date}}</td>
                                            @if($item->session_1==1)
                                            <td>Done</td>
                                            @else
                                            <td>Pending</td>
                                            @endif
                                            @if($item->session_2==1)
                                            <td>Done</td>
                                            @else
                                            <td>Pending</td>
                                            @endif
                                            @if($item->session_3==1)
                                            <td>Done</td>
                                            @else
                                            <td>Pending</td>
                                            @endif
                                            @if($item->session_4==1)
                                            <td>Done</td>
                                            @else
                                            <td>Pending</td>
                                            @endif
                                            @if($item->session_5==1)
                                            <td>Done</td>
                                            @else
                                            <td>Pending</td>
                                            @endif
                                        <td><a href="./get-inspection-detail/{{$item->id}}"><button class="btn btn-primary">Inspection</button></a></td>
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
</div>
@endsection