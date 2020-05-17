@extends('layouts.w_app')

@section('content')
    <!-- works -->
    <div class="works" style="padding-top: 20px;" id="work">
      <div class="container">
        <div class="row">
        <?php if(isset($shop)){ ?>
          <div class="col-md-3">
            <div class="work-item">
              <img width="250" height="200" src="{{ asset('images') }}/{{ $shop->shop_image }}" alt="Shop Image" />
              <h3><a href="#">{{ $shop->shop_name }}</a></h3>
              <h4>€. {{ $shop->coffee_price }}</h4>
              <h5>{{ $shop->shop_details }}</h5>
            </div>
          </div>
          <div class="col-md-6">
            <div class="append_errors" style="color: #a94442; background-color: #f2dede; border-color: #ebccd1; border-radius: 5px; padding: 17px 0px 1px 0px; margin-bottom: 30px; display: none;">
              <ul></ul>
            </div>
            <div class="append_success" style="color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6; border-radius: 5px; padding: 17px 0px 1px 0px; margin-bottom: 30px; display: none;">
              <ul></ul>
            </div>
            <form method="post" role="form" class="form-horizontal add_review_form">
              @csrf
              <fieldset class="scheduler-border">
                <legend class="scheduler-border">Basic Info of Shop</legend>
                <div class="form-group row add">
                  <label for="email_address" class="control-label col-sm-3" style="font-weight: 600;">Email address :</label>
                  <div class="col-sm-9">
                    <input type="email" name="email_address" id="email_address" style="border-radius: 5px;" placeholder="Enter your email address" class="form-control" required/>
                  </div>
                </div>
                <div class="form-group row add">
                  <label for="star_rating" class="control-label col-sm-3" style="font-weight: 600;">Star Rating :</label>
                  <div class="col-sm-9">
                    <input type="text" name="star_rating" id="star_rating" style="border-radius: 5px;" placeholder="Enter rating in number e.g: 1,2,3,4 or 5" onkeypress="return isNumber(event)" maxlength="1" class="form-control" required/>
                    <input type="hidden" value="{{ $shop->id }}" name="shop_id">
                  </div>
                </div>
                <div class="form-group row add">
                  <label for="fid" class="control-label col-sm-3" style="font-weight: 600;">Give Review :</label>
                  <div class="col-sm-9">
                    <textarea name="review_details" class="form-control review_details" style="border-radius: 5px;" placeholder="Enter review..." rows="3" cols="30" autocomplete="off"></textarea>
                    <br>
                    <button type="submit" class="btn btn-save" style="color: #fb6c6c; font-size: 16px; font-weight: 600; padding-right: 50px; padding-left: 50px;">Save</button>
                  </div>
                </div>
              </fieldset>
            </div>
          </form>
          </div>
        <?php } ?>
        <div class="row">
          <div class="col-sm-12">
            <hr>
          </div>
          <h2>Users Ratings</h2>
          <?php if(isset($reviews) && count($reviews) > 0){ ?>
            @foreach($reviews as $review)
            <div class="col-sm-12">
              <div class="row">
                @if($review->review_member_type == "paid")
                <div class="col-sm-2">
                  <h5>{{ $review->name }} {{ $review->lname }}</h5>
                  <h5>{{ $review->email }}</h5>
                    <h5>Shop : {{ $review->shop_name }}</h5>
                    <h5>Coffee Price : Rs. {{ $review->coffee_price }}</h5>
                </div>
                @endif
                <div class="col-sm-10">
                  <div style="padding-top: 13px;">
                    <?php
                    $tmp = $review->star_rating;
                    for($i = 1;$i <= $tmp;$i++) {
                      if ($tmp >= $i) {
                        echo "<i class='fa fa-star' aria-hidden='true'></i>";
                      } else {
                        echo "<i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i><i class='fa fa-star' aria-hidden='true'></i>";
                      }
                    }
                    ?>
                  </div>
                  <h5>{{ $review->review_details }}</h5>
                  <h5><?php echo date('d M Y',strtotime($review->review_date)); ?></h5>
                </div>
              </div>
              <hr/>
            </div>
            @endforeach
        <?php }else {
          echo "Reviews are not added yet.....";
        } ?>
        </div>
        </div>
      </div>
    </div>
      <!-- add review modal end -->
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

    $('.add_review_form').on('submit', function(event){
  		event.preventDefault();

      $.ajax({
        url:"{{ url('member/store_review') }}",
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
  					$('.append_errors').hide();
  					$('.append_success').show();
  					$('.append_success ul').append("<li>Thanks for your review.</li>");
            $('.add_review_form')[0].reset();
            setTimeout(function(){ $('.append_success').hide(); },3000);
  					setTimeout(function(){ $('#AddReviewModal').modal('hide'); },3000);
  					setTimeout(function(){ $('body').removeClass('modal-open'); },3000);
  					setTimeout(function(){ $('.modal-backdrop').remove(); },3000);
  	      }
        },
      });
    });
  });
</script>
<style media="screen">
  .fa{
    color: #FDCC0D;
  }
</style>
@endsection
