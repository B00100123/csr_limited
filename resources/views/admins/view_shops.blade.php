@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <!-- add shop modal -->
      <div class="modal fade" id="ShopModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="max-width: 1000px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Shop</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="append_errors" style="color: #a94442; background-color: #f2dede; border-color: #ebccd1; border-radius: 5px; padding: 17px 0px 1px 0px; margin-bottom: 30px; display: none;">
              <ul></ul>
            </div>
            <div class="append_success" style="color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6; border-radius: 5px; padding: 17px 0px 1px 0px; margin-bottom: 30px; display: none;">
              <ul></ul>
            </div>
            <form method="post" role="form" class="form-horizontal shop_form">
              @csrf
              <fieldset class="scheduler-border">
                <legend class="scheduler-border">Basic Info of Shop</legend>
                <div class="form-group row add">
                  <div class="col-sm-6">
                    <input type="text" name="shop_name" id="shop_name" style="border-radius: 5px;" class="form-control" placeholder="Enter shop name" autocomplete="off" required/>
                    <input type="hidden" name="user_id" value="{{ $id }}"/>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="coffee_price" onkeypress="return isNumber(event)" maxlength="4" style="border-radius: 5px;" class="form-control" placeholder="Enter coffee price" autocomplete="off"/>
                  </div>
                </div>
                <div class="form-group row add">
                  <div class="col-sm-6">
                    <select class="form-control" id="status" style="border-radius: 5px;" name="status">
                      <option value="">Select Status</option>
                      <option value="activated">Activated</option>
                      <option value="deactivated">Deactivate</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <input type="file" name="shop_image" id="shop_image" style="border-radius: 5px;" class="form-control" accept="images/*"/>
                  </div>
                </div>
                <div class="form-group row add">
                  <div class="col-sm-6">
                    <textarea name="shop_details" id="shop_details" style="border-radius: 5px;" class="form-control" placeholder="Enter shop details" rows="3" cols="30" autocomplete="off"></textarea>
                  </div>
                  <div class="col-sm-3 show_i">
      						</div>
                </div>
              </fieldset>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-save">Save</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
      </div>
    <!-- add store modal end -->
    <!-- edit store modal -->
      <div class="modal fade" id="EditShopModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      	<div class="modal-dialog" role="document" style="max-width: 1000px !important;">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h5 class="modal-title" id="exampleModalLabel">Edit Shop</h5>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      				</button>
      			</div>
      			<div class="modal-body">
      				<div class="edit_append_errors" style="color: #a94442; background-color: #f2dede; border-color: #ebccd1; border-radius: 5px; padding: 17px 0px 1px 0px; margin-bottom: 30px; display: none;">
      					<ul></ul>
      				</div>
      				<div class="edit_append_success" style="color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6; border-radius: 5px; padding: 17px 0px 1px 0px; margin-bottom: 30px; display: none;">
      					<ul></ul>
      				</div>
      				<form method="post" role="form" class="form-horizontal edit_shop_form">
      					@csrf
                <fieldset class="scheduler-border">
                  <legend class="scheduler-border">Basic Info of Shop</legend>
                  <div class="form-group row add">
        						<label for="fid" class="control-label col-sm-1" style="font-weight: 500;">ID :</label>
        						<div class="col-sm-11">
        							<input type="text" name="fid" style="border-radius: 5px;" class="form-control fid" disabled/>
        							<input type="hidden" class="edit_fid" name="edit_fid">
        						</div>
        					</div>
                  <div class="form-group row add">
                    <div class="col-sm-6">
                      <input type="text" name="edit_shop_name" style="border-radius: 5px;" class="form-control edit_shop_name" placeholder="Enter shop name" autocomplete="off" autofocus required/>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="edit_coffee_price" class="form-control edit_coffee_price" onkeypress="return isNumber(event)" maxlength="4" style="border-radius: 5px;" class="form-control" placeholder="Enter coffee price" autocomplete="off"/>
                    </div>
                  </div>
                  <div class="form-group row add">
                    <div class="col-sm-6">
                      <select class="form-control edit_status" style="border-radius: 5px;" name="edit_status">
                        <option value="">Select Status</option>
                        <option value="activated">Activated</option>
                        <option value="deactivated">Deactivate</option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <input type="file" name="edit_shop_image" id="edit_shop_image" style="border-radius: 5px;" class="form-control" accept="images/*"/>
                    </div>
                  </div>
                  <div class="form-group row add">
                    <div class="col-sm-6">
                      <textarea name="edit_shop_details" class="form-control edit_shop_details" style="border-radius: 5px;" placeholder="Enter shop details" rows="3" cols="30" autocomplete="off"></textarea>
                    </div>
                    <div class="col-sm-3 show_image">
        						</div>
                  </div>
                </fieldset>
      				</div>
      				<div class="modal-footer">
      					<button type="submit" class="edit btn btn-save">Update</button>
      					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      				</div>
      			</form>
      		</div>
      	</div>
      </div>
      <!-- edit shop modal end -->
      <!-- delete shop modal -->
      <div class="modal fade" id="DeleteShopModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      	<div class="modal-dialog" role="document" style="max-width: 1000px !important;">
      		<div class="modal-content">
      			<div class="modal-body">
              <div class="delete_append_success" style="color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6; border-radius: 5px; padding: 17px 0px 1px 0px; margin-bottom: 30px; display: none;">
                <ul></ul>
              </div>
      				<div class="deletecontent">
      					Are you sure want to delete <span class="title" style="font-size: 18px; font-weight: 500;"></span>?
      					<span class="id" style="display: none;"></span>
      				</div>
      			</div>
      			<div class="modal-footer">
      				<button type="button" class="delete btn btn-danger">Delete</button>
      				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      			</div>
      		</div>
      	</div>
      </div>
      <!-- edit shop modal end -->

    <div id="page-content-wrapper">

        <div class="container-fluid py-3" id="shops">
          <!-- table-->
          <div class="card">
              <div class="card-header bg-blue text-light">
                <div class="row">
                  <div class="col-sm-6">
                    <h4 class="mb-0">Shops</h4>
                  </div>
                  <div class="col-sm-6" style="text-align: right;">
                    <a class="btn btn-default btn-yellow" href="#" data-toggle="modal" data-target="#ShopModal" data-whatever="@mdo"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Shop</a>
                  </div>
                </div>
              </div>
              <div class="table-responsive small">
                  <table class="table table-condensed" id="shopTable">
                      <thead>
                          <tr>
                              <th><span>Name</span></th>
                              <th><span>Details</span></th>
                              <th><span>Coffee Price</span></th>
                              <th><span>Status</span></th>
                              <th><span>Listing Date</span></th>
                              <th><span>Image</span></th>
                              <th class="text-center" style="width:110px">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          {{ csrf_field() }}
                         <?php if(isset($shops) && count($shops) > 0){ ?>
                           @foreach($shops as $shop)
                             <tr class="ShopInfo{{$shop->id}}">
                               <td>{{ $shop->shop_name }}</td>
                               <td>{{ $shop->shop_details }}</td>
                               <td>€. {{ $shop->coffee_price }}</td>
                               <td>{{ $shop->status }}</td>
                               <td><?php echo date('d M Y',strtotime($shop->listing_date)); ?></td>
                               <td> <img src="{{ asset('images') }}/{{ $shop->shop_image }}" width="50px" height="50px" alt="Shop Image"> </td>
                               <td class="px-2 text-nowrap">
                                 <a href="#" class="edit_modal btn btn-sm btn-save" data-id="{{ $shop->id }}" data-shop_name="{{ $shop->shop_name }}" data-shop_details="{{ $shop->shop_details }}" data-coffee_price="{{ $shop->coffee_price }}" data-status="{{ $shop->status }}" data-shop_image="{{ $shop->shop_image }}"  data-toggle="modal" data-target="#EditShopModal" data-whatever="@mdo"><i class='fa fa-pencil'></i></a>
                                 <a href="#" class="delete_modal btn btn-sm btn-danger" data-id="{{ $shop->id }}" data-shop_name="{{ $shop->shop_name }}" data-toggle="modal" data-target="#DeleteShopModal" data-whatever="@mdo"><i class='fa fa-trash'></i></a>
                               </td>
                             </tr>
                           @endforeach
                        <?php }else { ?>
                          <tr>
                            <th id="yet">
                              <h2>Shops are not added yet</h2>
                            </th>
                          </tr>
                        <?php } ?>
                        </tr>
                      </tbody>
                  </table>
              </div>
          </div>
          <div style="margin-top: 10px;margin-left: 440px;">
		         <ul class="pagination-for-shops justify-content-center">
             </ul>
		      </div>
        </div>
    </div>

<script type="text/javascript">
  function isNumber(evt){
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }

  $(document).ready(function(){

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#ShopModal').on('shown.bs.modal', function () {
      $('#shop_name').focus();
    });

  $('.shop_form').on('submit', function(event){
		event.preventDefault();

    $.ajax({
      url:"{{ url('member/store_shop_info') }}",
      method:"POST",
      data:new FormData(this),
      dataType:"JSON",
			contentType:false,
			cache:false,
			processData:false,
      success:function(data){
				$('.append_errors ul').text('');
				$('.append_success ul').text('');
        if(data.errors)
        {
					$.each(data.errors, function(i, error){
						$('.append_errors').show();
            $('.append_errors ul').append("<li>" + data.errors[i] + "</li>");
        	});
        }else {
          var date = moment(data.listing_date).format("D MMM YYYY");
          var u_id = data.id;

					$('tbody').prepend("<tr class='ShopInfo"+data.id+"'>"+
					"<td>" + data.shop_name + "</td>"+
					"<td>" + data.shop_details + "</td>"+
					"<td>" +'Rs. '+ data.coffee_price + "</td>"+
					"<td>" + data.status + "</td>"+
					"<td>" + date + "</td>"+
          "<td>" + '<img src={{ asset("images") }}/'+data.shop_image+' width="50px" height="50px">'+ "</td>"+
					"<td class='px-2 text-nowrap'><a href='#' class='edit_modal btn btn-sm btn-save' data-id='"+data.id+"' data-shop_name='"+data.shop_name+"' data-shop_details='"+data.shop_details+"' data-coffee_price='"+data.coffee_price+"' data-status='"+data.status+"' data-shop_image='"+data.shop_image+"' data-toggle='modal' data-target='#EditShopModal' data-whatever='@mdo'>"+
					"<i class='fa fa-pencil'></i></a> "+
					"<a href='#' class='delete_modal btn btn-sm btn-danger' data-id='"+data.id+"' data-shop_name='"+data.shop_name+"' data-toggle='modal' data-target='#DeleteShopModal' data-whatever='@mdo'>"+
					"<i class='fa fa-trash'></i></a>"+
					"</td>"+
					"</tr>");
					$('#yet').hide();
					$('.append_errors').hide();
					$('.append_success').show();
					$('.append_success ul').append("<li>Shop Created Successfully.</li>");
          $('.shop_form')[0].reset();
          setTimeout(function(){ $('.append_success').hide(); },3000);
					setTimeout(function(){ $('#ShopModal').modal('hide'); },3000);
					setTimeout(function(){ $('body').removeClass('modal-open'); },3000);
					setTimeout(function(){ $('.modal-backdrop').remove(); },3000);
	      }
      },
    });
  });

	$(document).on('click', '.edit_modal', function(){
    $('.edit_shop_form')[0].reset();
		$('.fid').val($(this).data('id'));
		$('.edit_fid').val($(this).data('id'));
		$('.edit_shop_name').val($(this).data('shop_name'));
		$('.edit_coffee_price').val($(this).data('coffee_price'));
    $('.edit_shop_details').val($(this).data('shop_details'));
    $('.show_image').html('<img src={{ asset("images") }}/'+$(this).data('shop_image')+' width="155px" height="150px">');
		$(".edit_status option[value='"+$(this).data('status')+"']").prop('selected', true);
		$('.edit_append_errors').hide();
		$('.edit_append_success').hide();
	});

	$('.edit_shop_form').on('submit', function(event){
		event.preventDefault();
    $.ajax({
      url:"{{ url('member/update_shop_info') }}",
      method:"POST",
			data:new FormData(this),
      dataType:"JSON",
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
				$('.edit_append_errors ul').text('');
				$('.edit_append_success ul').text('');
        if(data.errors)
        {
					$.each(data.errors, function(i, error){
						$('.edit_append_errors').show();
            $('.edit_append_errors ul').append("<li>" + data.errors[i] + "</li>");
        	});
        }else {
          var date = moment(data.created_at).format("D MMM YYYY");

					$('.ShopInfo' + data.id).replaceWith(" "+
					"<tr class='ShopInfo"+data.id+"'>"+
					"<td>" +data.shop_name + "</td>"+
					"<td>" + data.shop_details + "</td>"+
					"<td>" +"Rs. "+ data.coffee_price + "</td>"+
					"<td>" + data.status + "</td>"+
					"<td>" + date + "</td>"+
          "<td>" + '<img src={{ asset("images") }}/'+data.shop_image+' width="50px" height="50px">'+ "</td>"+
					"<td class='px-2 text-nowrap'><a href='#' class='edit_modal btn btn-sm btn-save' data-id='"+data.id+"' data-shop_name='"+data.shop_name+"' data-shop_details='"+data.shop_details+"' data-coffee_price='"+data.coffee_price+"' data-status='"+data.status+"' data-shop_image='"+data.shop_image+"' data-toggle='modal' data-target='#EditShopModal' data-whatever='@mdo'>"+
					"<i class='fa fa-pencil'></i></a> "+
					"<a href='#' class='delete_modal btn btn-sm btn-danger' data-id='"+data.id+"' data-shop_name='"+data.shop_name+"' data-toggle='modal' data-target='#DeleteShopModal' data-whatever='@mdo'>"+
					"<i class='fa fa-trash'></i></a>"+
					"</td>"+
					"</tr>");
					$('.edit_append_errors').hide();
					$('.edit_append_success').show();
					$('.edit_append_success ul').append("<li>Shop Updated Successfully.</li>");
					setTimeout(function(){ $('#EditShopModal').modal('hide'); },3000);
					setTimeout(function(){ $('body').removeClass('modal-open'); },3000);
					setTimeout(function(){ $('.modal-backdrop').remove(); },3000);
        }
      },
    });
  });

	$(document).on('click', '.delete_modal', function(){
		$('.title').html($(this).data('shop_name'));
		$('.id').text($(this).data('id'));
	});

  $('.delete').on('click',function(event){
		event.preventDefault();
		var data = {
			'_token' : $('input[name=_token]').val(),
			'id' : $('.id').text()
		};

    $.ajax({
        type:'POST',
        url:"{{ url('member/delete_shop_info') }}",
				data:data,
				dataType:"json",
        success:function(data){
					$('.delete_append_success ul').text('');
					$('.delete_append_success').show();
					$('.delete_append_success ul').append("<li>"+data+"</li>");
          $('.ShopInfo' + $('.id').text()).remove();
          setTimeout(function(){ $('.delete_append_success').hide(); },3000);
					setTimeout(function(){ $('#DeleteShopModal').modal('hide'); },3000);
					setTimeout(function(){ $('body').removeClass('modal-open'); },3000);
					setTimeout(function(){ $('.modal-backdrop').remove(); },3000);
        }
    });
  });
});
</script>
<style media="screen">
.close{
  font-size: 1.4rem;
}
</style>
@endsection
