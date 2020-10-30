@extends('admin.layout.index')
@section('content')
<style>
  .content-i {
    width: 100%;
}
</style>
<div class="content-i">
  <div class="content-box">
      <div class="element-wrapper">
          <h6 class="element-header">
              Data Tables
          </h6>
          <div class="element-box">
            @foreach ($data as $item)
            <div class="row">
              <div class="col-sm-9 col-xs-6">
                <input type="text" class="id-potentials" value="{{$item->id}}" style="display: none">
              <h5>Potentials ID - {{$item->id}}</h5>
              <div class="link-view"><a href="http://localhost/webapp_test/public/get-inspection-detail/{{$item->site_inspection_id}}">Survey ID {{$item->site_inspection_id}}</a></div>
              </div>
              <div class="col-sm-3 col-xs-6">
                <div class="system-size">
                  <h5>Estimated System Size</h5>
                  <h3>{{$item->system_size}} kW</h3>
                </div>
              </div>
            </div>
            @endforeach
            <form id="formValidate" method="POST" action="https://plugincheckout.com/webapp/sale/update-potential" novalidate="true">
              <input type="hidden" name="_token" value="xfhz7QtgmCc6fYzHF1bNMCo6zPDSTzFdbBTR8fOn">
              <input type="hidden" name="id" value="1">
              <div class="form-group potential-status">
                <label for="">Potential Status</label>
                
              <select class="form-control select-poten" name="status" id="select-status">
                    <option value="1" {{$item->status==1?'selected':''}} {{isset($item->status)?'':'selected'}}>Negotiation/Review</option>
                    <option value="2" {{$item->status==2?'selected':''}}>Closed Won</option>                 
                    <option value="3" {{$item->status==3?'selected':''}}>Closed Lost</option>                
                    <option value="4" {{$item->status==4?'selected':''}}>Closed Lost to Competition</option>
                </select>
              </div>
              <div class="reason-comments" style="display: none;">
                <div class="form-group">
                  <label for=""> Reason</label>
                  <select class="form-control" name="reason" {{$item->reason=='Found Better Pricing'?'selected':''}}>
                    <option value="Found Better Pricing">
                      Found Better Pricing
                    </option>
                    <option value="Better Components Found" {{$item->reason=='Better Components Found'?'selected':''}}>
                      Better Components Found
                    </option>
                    <option value="Finance Issue" {{$item->reason=='Finance Issue'?'selected':''}}>
                      Finance Issue
                    </option>
                    <option value="Unable to Afford" {{$item->reason=='Unable to Afford'?'selected':''}}>
                      Unable to Afford
                    </option>
                    <option value="No shadow free Space on roof" {{$item->reason=='No shadow free Space on roof'?'selected':''}}>
                      No shadow free Space on roof
                    </option>
                    <option value="Roof not easily accessible" {{$item->reason=='Roof not easily accessible'?'selected':''}}>
                      Roof not easily accessible
                    </option>
                    <option value="Maintenance is a burden" {{$item->reason=='Maintenance is a burden'?'selected':''}}>
                      Maintenance is a burden
                    </option>
                    <option value="Don't think Solar is a Viable Option" {{$item->reason=="Don't think Solar is a Viable Option"?"selected":""}}>
                      Don't think Solar is a Viable Option
                    </option>
                                  </select>
                </div>
                <div class="form-group">
                  <label>Comments</label>
                  <textarea class="form-control" rows="3" name="comments">{{$item->comments}}</textarea>
                </div>
              </div>
              <fieldset class="form-group agreement" style="display: none;">
                <legend><span>Agreement</span></legend>
                <div class="agreement-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu justo a purus interdum facilisis. In et erat a quam lobortis tincidunt. Donec sed pulvinar lacus. In orci velit, consequat eu malesuada quis, egestas nec nisl. Aenean sed diam molestie, volutpat metus ornare, fringilla lectus. Nunc in nunc cursus, pharetra lorem id, pharetra augue. Mauris facilisis tempor ligula, ultricies fermentum nulla ultricies eget. In non mollis nulla, non fringilla magna. Vivamus efficitur lorem eu pulvinar tincidunt. Sed at nisi pretium, sollicitudin ex sed, aliquam diam. Mauris eget tincidunt nisi.</p>
                  <div id="my_content"></div>
                  <div class="read-link" style="text-align: right;">
                    <a href="#">Read a full Agreement</a>
                  </div>
                </div>
              </fieldset>
              <div class="form-buttons-w">
              <button class="btn btn-primary class-change update-status" data-userid="{{$item->user_id}}" data-idspec="{{$item->site_inspection_id}}" type="submit"> Submit</button>
              </div>
            </form>
          </div>
      </div>
  </div>
</div>
@section('script')
<script>
  $(document).ready(function(){
    var status = $('#select-status').val();

      if(status==1){
        $('.reason-comments').css('display','none');
        $('.agreement').css('display','none');
      }
      if(status==2){
        $('.reason-comments').css('display','none');
        $('.agreement').css('display','block');
      }
      if(status == 3||status == 4){
        $('.agreement').css('display','none');
        $('.reason-comments').css('display','block');
      }
    $("form").submit(function(e){
            e.preventDefault();
        });
    $('#select-status').on('change',function(){
      var status = $(this).val();
      if(status==1){
        $('.reason-comments').css('display','none');
        $('.agreement').css('display','none');
      }
      if(status==2){
        $('.reason-comments').css('display','none');
        $('.agreement').css('display','block');
      }
      if(status == 3||status == 4){
        $('.agreement').css('display','none');
        $('.reason-comments').css('display','block');
      }
    });
    $('.update-status').on('click',function(){
        var status = $('#select-status').val();
        var id = $('.id-potentials').val();
        if(status==3||status==4){
          var reason = $('select[name=reason]').val();
          var comments = $('textarea[name=comments]').val();
        }
        $('#loading').show();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
        url: '{{asset("api/update-status-potentials-api")}}',
        method: 'post',
        data: {
            'id':id,
            'status':status,
            'reason':reason,
            'comments':comments,
            'site_inspection_id':$(this).data('idspec'),
            'id_user':$(this).data('userid')
        },
        success: function (data) {
          $('#loading').hide();
          swal("Update success", "", "success");
        }
        })
    });
  });
</script>
@endsection
@endsection