@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <!-- add user modal -->
      <div class="modal fade" id="UserModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="max-width: 1000px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
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
            <form method="post" role="form" class="form-horizontal user_form">
              @csrf
              <fieldset class="scheduler-border">
                <legend class="scheduler-border">Basic Info of User</legend>
                <div class="form-group row add">
                  <div class="col-sm-6">
                    <input type="text" name="name" id="name" style="border-radius: 5px;" class="form-control" placeholder="Enter first name" autocomplete="off" required/>
                    <input type="hidden" name="user_type" value="unpaid"/>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="lname" style="border-radius: 5px;" class="form-control" placeholder="Enter last name" autocomplete="off"/>
                  </div>
                </div>
                <div class="form-group row add">
                  <div class="col-sm-6">
                    <input type="email" name="email" style="border-radius: 5px;" class="form-control" placeholder="Enter email" autocomplete="off"/ required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password" style="border-radius: 5px;" class="form-control" placeholder="Enter password"/ required>
                  </div>
                </div>
                <div class="form-group row add">
                  <div class="col-sm-6">
                    <input type="text" name="phone" onkeypress="return isNumber(event)" style="border-radius: 5px;" maxlength="11" class="form-control" placeholder="Enter phone number e.g : 021 32123213" autocomplete="off"/>
                  </div>
                  <div class="col-sm-6">
                    <select class="form-control" id="status" style="border-radius: 5px;" name="status">
                      <option value="">Select Status</option>
                      <option value="activated">Activated</option>
                      <option value="deactivated">Deactivate</option>
                    </select>
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
    <!-- add users modal end -->
    <!-- edit users modal -->
      <div class="modal fade" id="EditUserModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      	<div class="modal-dialog" role="document" style="max-width: 1000px !important;">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
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
      				<form method="post" role="form" class="form-horizontal edit_user_form">
      					@csrf
                <fieldset class="scheduler-border">
                  <legend class="scheduler-border">Basic Info of User</legend>
                  <div class="form-group row add">
        						<label for="fid" class="control-label col-sm-1" style="font-weight: 500;">ID :</label>
        						<div class="col-sm-11">
        							<input type="text" name="fid" style="border-radius: 5px;" class="form-control fid" disabled/>
        							<input type="hidden" class="edit_fid" name="edit_fid">
        						</div>
        					</div>
                  <div class="form-group row add">
                    <div class="col-sm-6">
                      <input type="text" name="edit_name" style="border-radius: 5px;" class="form-control edit_name" placeholder="Enter first name" autocomplete="off" autofocus required/>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="edit_lname" style="border-radius: 5px;" class="form-control edit_lname" placeholder="Enter last name" autocomplete="off"/>
                    </div>
                  </div>
                  <div class="form-group row add">
                    <div class="col-sm-6">
                      <input type="email" name="edit_email" style="border-radius: 5px;" class="form-control edit_email" placeholder="Enter email" autocomplete="off"/ required>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="edit_phone" onkeypress="return isNumber(event)" style="border-radius: 5px;" maxlength="11" class="form-control edit_phone" placeholder="Enter phone number e.g : 021 32123213" autocomplete="off"/>
                    </div>
                  </div>
                  <div class="form-group row add">
                    <div class="col-sm-6">
                      <select class="form-control" id="edit_status" style="border-radius: 5px;" name="edit_status">
                        <option value="">Select Status</option>
                        <option value="activated">Activated</option>
                        <option value="deactivated">Deactivate</option>
                      </select>
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
      <!-- edit users modal end -->
      <!-- delete users modal -->
      <div class="modal fade" id="DeleteUserModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <!-- edit users modal end -->

    <div id="page-content-wrapper">

        <div class="container-fluid py-3" id="users">
          <!-- table-->
          <div class="card">
              <div class="card-header bg-blue text-light">
                <div class="row">
                  <div class="col-sm-6">
                    <h4 class="mb-0">Users</h4>
                  </div>
                  <div class="col-sm-6" style="text-align: right;">
                    <a class="btn btn-default btn-yellow" href="#" data-toggle="modal" data-target="#UserModal" data-whatever="@mdo"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add User</a>
                  </div>
                </div>
              </div>
              <div class="table-responsive small">
                  <table class="table table-condensed" id="userTable">
                      <thead>
                          <tr>
                              <th><span>Name</span></th>
                              <th><span>Username</span></th>
                              <th><span>Email</span></th>
                              <th><span>Contact</span></th>
                              <th><span>Status</span></th>
                              <th><span>Created Date</span></th>
                              <th class="text-center" style="width:110px">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          {{ csrf_field() }}
                         <?php if(isset($users) && count($users) > 0){ ?>
                           @foreach($users as $user)
                             <tr class="UserInfo{{$user->id}}">
                               <td> {{ $user->name }} {{ $user->lname }}</td>
                               <td> {{ $user->username }}</td>
                               <td> {{ $user->email }}</td>
                               <td> {{ $user->phone }}</td>
                               <td> {{ $user->status }}</td>
                               <td><?php echo date('d M Y',strtotime($user->user_created_at)); ?></td>
                               <td class="px-2 text-nowrap">
                                 <a href="#" class="edit_modal btn btn-sm btn-save" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-lname="{{ $user->lname }}" data-email="{{ $user->email }}" data-phone="{{ $user->phone }}" data-status="{{ $user->status }}"  data-toggle="modal" data-target="#EditUserModal" data-whatever="@mdo"><i class='fa fa-pencil'></i> Edit</a>
                                 <a href="#" class="delete_modal btn btn-sm btn-danger" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-lname="{{ $user->lname }}" data-toggle="modal" data-target="#DeleteUserModal" data-whatever="@mdo"><i class='fa fa-trash'></i> Delete</a>
                               </td>
                             </tr>
                           @endforeach
                        <?php }else { ?>
                          <tr>
                            <th id="yet">
                              <h2>Users are not added yet</h2>
                            </th>
                          </tr>
                        <?php } ?>
                        </tr>
                      </tbody>
                  </table>
              </div>
          </div>
          <div style="margin-top: 10px;margin-left: 440px;">
		         <ul class="pagination-for-users justify-content-center">
               {{ $users->links() }}
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

    $('#UserModal').on('shown.bs.modal', function () {
      $('#name').focus();
    });

  $('.user_form').on('submit', function(event){
		event.preventDefault();

    $.ajax({
      url:"{{ url('admin/store_user_info') }}",
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
          var date = moment(data.user_created_at).format("D MMM YYYY");
          var u_id = data.id;

					$('tbody').prepend("<tr class='UserInfo"+data.id+"'>"+
					"<td>" + data.name + ' ' + data.lname + "</td>"+
          "<td>" + data.username + "</td>"+
					"<td>" + data.email + "</td>"+
					"<td>" + data.phone + "</td>"+
					"<td>" + data.status + "</td>"+
					"<td>" + date + "</td>"+
					"<td class='px-2 text-nowrap'><a href='#' class='edit_modal btn btn-sm btn-save' data-id='"+data.id+"' data-name='"+data.name+"' data-lname='"+data.lname+"' data-email='"+data.email+"' data-phone='"+data.phone+"' data-status='"+data.status+"' data-toggle='modal' data-target='#EditUserModal' data-whatever='@mdo'>"+
					"<i class='fa fa-pencil'></i> Edit</a> "+
					"<a href='#' class='delete_modal btn btn-sm btn-danger' data-id='"+data.id+"' data-name='"+data.name+"' data-lname='"+data.lname+"' data-toggle='modal' data-target='#DeleteUserModal' data-whatever='@mdo'>"+
					"<i class='fa fa-trash'></i> Delete</a>"+
					"</td>"+
					"</tr>");
					$('#yet').hide();
					$('.append_errors').hide();
					$('.append_success').show();
					$('.append_success ul').append("<li>User Created Successfully.</li>");
          $('.user_form')[0].reset();
          setTimeout(function(){ $('.append_success').hide(); },3000);
					setTimeout(function(){ $('#UserModal').modal('hide'); },3000);
					setTimeout(function(){ $('body').removeClass('modal-open'); },3000);
					setTimeout(function(){ $('.modal-backdrop').remove(); },3000);
	      }
      },
    });
  });

	$(document).on('click', '.edit_modal', function(){
    $('.edit_user_form')[0].reset();
		$('.fid').val($(this).data('id'));
		$('.edit_fid').val($(this).data('id'));
		$('.edit_name').val($(this).data('name'));
		$('.edit_lname').val($(this).data('lname'));
		$('.edit_email').val($(this).data('email'));
		$('.edit_phone').val($(this).data('phone'));
    $("#edit_status option[value='"+$(this).data('status')+"']").prop('selected', true);
		$('.edit_append_errors').hide();
		$('.edit_append_success').hide();
	});

	$('.edit_user_form').on('submit', function(event){
		event.preventDefault();
    $.ajax({
      url:"{{ url('admin/update_user_info') }}",
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


					$('.UserInfo' + data.id).replaceWith(" "+
					"<tr class='UserInfo"+data.id+"'>"+
					"<td>" + data.name + ' ' + data.lname + "</td>"+
          "<td>" + data.username + "</td>"+
					"<td>" + data.email + "</td>"+
					"<td>" + data.phone + "</td>"+
					"<td>" + data.status + "</td>"+
					"<td>" + date + "</td>"+
					"<td class='px-2 text-nowrap'><a href='#' class='edit_modal btn btn-sm btn-save' data-id='"+data.id+"' data-name='"+data.name+"' data-lname='"+data.lname+"' data-email='"+data.email+"' data-status='"+data.status+"' data-phone='"+data.phone+"' data-toggle='modal' data-target='#EditUserModal' data-whatever='@mdo'>"+
					"<i class='fa fa-pencil'></i> Edit</a> "+
					"<a href='#' class='delete_modal btn btn-sm btn-danger' data-id='"+data.id+"' data-name='"+data.name+"' data-lname='"+data.lname+"' data-toggle='modal' data-target='#DeleteUserModal' data-whatever='@mdo'>"+
					"<i class='fa fa-trash'></i> Delete</a>"+
					"</td>"+
					"</tr>");
					$('.edit_append_errors').hide();
					$('.edit_append_success').show();
					$('.edit_append_success ul').append("<li>User Updated Successfully.</li>");
					setTimeout(function(){ $('#EditUserModal').modal('hide'); },3000);
					setTimeout(function(){ $('body').removeClass('modal-open'); },3000);
					setTimeout(function(){ $('.modal-backdrop').remove(); },3000);
        }
      },
    });
  });

	$(document).on('click', '.delete_modal', function(){
		$('.title').html($(this).data('name')+' '+$(this).data('lname'));
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
        url:"{{ url('admin/delete_user_info') }}",
				data:data,
				dataType:"json",
        success:function(data){
					$('.delete_append_success ul').text('');
					$('.delete_append_success').show();
					$('.delete_append_success ul').append("<li>"+data+"</li>");
          $('.UserInfo' + $('.id').text()).remove();
          setTimeout(function(){ $('.delete_append_success').hide(); },3000);
					setTimeout(function(){ $('#DeleteUserModal').modal('hide'); },3000);
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
