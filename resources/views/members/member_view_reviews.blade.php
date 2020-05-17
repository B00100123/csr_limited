@extends('layouts.m_app')

@section('content')

    <!-- Page Content -->

    <!-- delete shop modal -->
    <div class="modal fade" id="DeleteReviewModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="max-width: 1000px !important;">
        <div class="modal-content">
          <div class="modal-body">
            <div class="delete_append_success" style="color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6; border-radius: 5px; padding: 17px 0px 1px 0px; margin-bottom: 30px; display: none;">
              <ul></ul>
            </div>
            <div class="deletecontent">
              Are you sure want to delete this review?
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

    <div id="page-content-wrapper">

        <div class="container-fluid py-3" id="reviews">
          <!-- table-->
          <div class="card">
              <div class="card-header bg-blue text-light">
                <div class="row">
                  <div class="col-sm-6">
                    <h4 class="mb-0">Reviews</h4>
                  </div>
                  <!-- <div class="col-sm-6" style="text-align: right;">
                    <a class="btn btn-default btn-yellow" href="#" data-toggle="modal" data-target="#ShopModal" data-whatever="@mdo"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Shop</a>
                  </div> -->
                </div>
              </div>
              <div class="table-responsive small">
                  <table class="table table-condensed" id="reviewTable">
                      <thead>
                          <tr>
                              <th><span>Shop Name</span></th>
                              <th><span>Review By</span></th>
                              <th><span>Star Rating</span></th>
                              <th><span>Review</span></th>
                              <th><span>Memeber Type</span></th>
                              <th><span>Review Date</span></th>
                              <th><span>Action</span></th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          {{ csrf_field() }}
                         <?php if(isset($reviews) && count($reviews) > 0){ ?>
                           @foreach($reviews as $review)
                             <tr class="ReviewInfo{{$review->id}}">
                               <td>{{ $review->shop_name }}</td>
                               <td>{{ $review->name }} {{ $review->lname }}</td>
                               <td>{{ $review->star_rating }}</td>
                               <td>{{ $review->review_details }}</td>
                               <td>{{ ucfirst($review->review_member_type) }}</td>
                               <td><?php echo date('d M Y',strtotime($review->review_date)); ?></td>
                               <td class="px-2 text-nowrap">
                                 <?php if($review->review_status == 'pending'){ ?>
                                 <a href="#" class="approve_link btn btn-sm btn-danger" data-id="{{ $review->id }}"><i class="fas fa-check"></i> Approve</a>
                                 <a href="#" class="delete_modal btn btn-sm btn-danger" data-id="{{ $review->id }}" data-toggle="modal" data-target="#DeleteReviewModal" data-whatever="@mdo"><i class='fas fa-trash'></i> Delete</a>
                               <?php }else { ?>
                                 <a href="#" class="btn btn-sm btn-success">Approved</a>
                                 <a href="#" class="delete_modal btn btn-sm btn-danger" data-id="{{ $review->id }}" data-toggle="modal" data-target="#DeleteReviewModal" data-whatever="@mdo"><i class='fas fa-trash'></i> Delete</a>
                               <?php } ?>
                               </td>
                             </tr>
                           @endforeach
                        <?php }else { ?>
                          <tr>
                            <th id="yet">
                              <h2>Reviews are not added yet</h2>
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
  $(document).ready(function(){

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('.approve_link').on('click',function(event){
  		event.preventDefault();

  		var data = {
  			'id' : $(this).data('id')
  		};

      $.ajax({
          type:'POST',
          url:"{{ url('member/approve_link') }}",
  				data:data,
  				dataType:"json",
          success:function(data){
            alert(data);
            location.reload();
          }
      });
    });

    $(document).on('click', '.delete_modal', function(){
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
          url:"{{ url('member/delete_review') }}",
  				data:data,
  				dataType:"json",
          success:function(data){
  					$('.delete_append_success ul').text('');
  					$('.delete_append_success').show();
  					$('.delete_append_success ul').append("<li>"+data+"</li>");
            setTimeout(function(){ $('.delete_append_success').hide(); },2000);
  					setTimeout(function(){ $('#DeleteReviewModal').modal('hide'); },2000);
  					setTimeout(function(){ $('body').removeClass('modal-open'); },2000);
  					setTimeout(function(){ $('.modal-backdrop').remove(); },2000);
            location.reload();
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
