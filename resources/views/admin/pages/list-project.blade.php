@extends('admin.layout.index')
@section('content')
    <div class="content-w">
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
                                                    style="width: 251px;">Project ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 378px;">SI Date
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 378px;">Name
                                                </th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Project ID</th>
                                                <th rowspan="1" colspan="1">SI Date</th>
                                                <th rowspan="1" colspan="1">Name</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($data as $item)
                                                <tr role="row" class="odd">
                                                    <td>{{$item->id}}</td>
                                                    <?php
                                                        $originalDate = $item->created_at;
                                                        $newDate = date("d-m-Y", strtotime($originalDate));
                                                    ?>
                                                    <td>{{$newDate}}</td>
                                                    <td><a href="{{asset('show-page-detail-project/'.$item->id)}}">{{$item->name}}</a></td>
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
@section('script')
    <script>
        $(function () {
            $('#artist').change(function () {
                $.ajax({
                    url: "artist_field.php",
                    dataType: "html",
                    type: "post",
                    success: function (data) {
                        $('#artist').append(data);
                    }
                });
            });
        });
    </script>
@endsection