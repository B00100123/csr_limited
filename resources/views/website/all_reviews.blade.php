@extends('layouts.w_app')

@section('content')
    <!-- works -->
    <div class="works" style="padding-top: 20px;" id="work">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <!-- <hr> -->
          </div>
          <h2>All Reviews</h2>
          <?php if(isset($reviews) && count($reviews) > 0){ ?>
            @foreach($reviews as $review)
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-12">
                  <h5>Coffee Shop Name : <a href="{{ url('member/add_review') }}/{{ $review->shop_id }}" target="_blank">{{ $review->shop_name }}</a></h5>
                  <h5>Coffee Price : €. {{ $review->coffee_price }}</h5>
                  <h5>Review Date : <?php echo date('d M Y',strtotime($review->review_date)); ?></h5>
                </div>
              </div>
              <hr/>
            </div>
            @endforeach
        <?php }else {
          echo "strin";
        } ?>
        </div>
        </div>
      </div>
    </div>
      <!-- add review modal end -->
    <script type="text/javascript">

    $(document).ready(function(){

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  });
</script>
<style media="screen">
  .fa{
    color: #FDCC0D;
  }
</style>
@endsection
