@extends('layouts.w_app')

@section('content')
    <!-- works -->
    <div class="works" style="padding-top: 20px;" id="work">
      <div class="container">
        <div class="row">
        <?php if(isset($shops) && count($shops) > 0){ ?>
          @foreach($shops as $shop)
          <div class="col-md-3">
            <div class="work-item">
              <img width="250" height="200" src="{{ asset('images') }}/{{ $shop->shop_image }}" alt="" />
              <h3><a href="#">{{ $shop->shop_name }}</a></h3>
              <a href="{{ url('member/add_review') }}/{{ $shop->id }}" class="add_review btn btn-default btn-lg" style="color: #fb6c6c;" target="_blank">Add Review</a>
            </div>
          </div>
          @endforeach
        <?php }else {
          echo "<h2>Shops are not added yet</h2>";
        } ?>
        </div>
      </div>
    </div>

    <!-- add review modal -->
      <div class="modal fade" id="AddReviewModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 1000px !important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="font-size:16px;">Add Review</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px; font-size:30px; font-weight: 600;">
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
              <form method="post" role="form" class="form-horizontal add_review_form">
                @csrf
                  <div class="form-group row add">
                    <label for="star_rating" class="control-label col-sm-3" style="font-weight: 600;">Star Rating :</label>
                    <div class="col-sm-9">
                      <input type="text" name="star_rating" id="star_rating" style="border-radius: 5px;" placeholder="Enter rating in number e.g: 1,2,3,4 or 5" onkeypress="return isNumber(event)" maxlength="1" class="form-control"/>
                      <input type="hidden" class="shop_id" name="shop_id">
                      <input type="hidden" class="user_id" name="user_id">
                      <input type="hidden" class="review_member_type" name="review_member_type">
                    </div>
                  </div>
                  <div class="form-group row add">
                    <label for="fid" class="control-label col-sm-3" style="font-weight: 600;">Give Review :</label>
                    <div class="col-sm-9">
                      <textarea name="review_details" class="form-control review_details" style="border-radius: 5px;" placeholder="Enter review..." rows="3" cols="30" autocomplete="off"></textarea>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="edit btn btn-save">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- add review modal end -->

    <!-- team -->
    <div class="team" id="team">
      <div class="container">
        <!-- default heading -->
        <div class="default-heading">
          <!-- heading -->
          <h2>Our Team</h2>
          <!-- paragraph -->
          <p>There are now a set available here in three<br>colours and in a banner sizes.</p>
        </div>
        <div class="row">
          <div class="col-md-3">
            <!-- team member -->
            <div class="member">
              <!-- team member image -->
              <img class="img-responsive" src="{{ asset('web_assets/img/team/1.jpg') }}" alt="" />
              <!-- member details / heading -->
              <h4><a href="#">John Doe</a></h4>
              <!-- paragraph -->
              <p>Short description about how cool John Doe is!</p>
            </div>
          </div>
          <div class="col-md-3">
            <!-- team member -->
            <div class="member">
              <!-- team member image -->
              <img class="img-responsive" src="{{ asset('web_assets/img/team/2.jpg') }}"  alt="" />
              <!-- member details / heading -->
              <h4><a href="#">John Doe</a></h4>
              <!-- paragraph -->
              <p>Short description about how cool John Doe is!</p>
            </div>
          </div>
          <div class="col-md-3">
            <!-- team member -->
            <div class="member">
              <!-- team member image -->
              <img class="img-responsive" src="{{ asset('web_assets/img/team/1.jpg') }}" alt="" />
              <!-- member details / heading -->
              <h4><a href="#">John Doe</a></h4>
              <!-- paragraph -->
              <p>Short description about how cool John Doe is!</p>
            </div>
          </div>
          <div class="col-md-3">
            <!-- team member -->
            <div class="member">
              <!-- team member image -->
              <img class="img-responsive" src="{{ asset('web_assets/img/team/2.jpg') }}" alt="" />
              <!-- member details / heading -->
              <h4><a href="#">John Doe</a></h4>
              <!-- paragraph -->
              <p>Short description about how cool John Doe is!</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- contact -->
    <div class="contact" id="contact">
      <div class="container">
        <!-- default heading -->
        <div class="default-heading">
          <!-- heading -->
          <h2>Contact Us</h2>
          <!-- paragraph -->
          <p>There are now a set available here in three<br>colours and in a banner sizes.</p>
        </div>
        <!-- contact container -->
        <div class="contact-container">
          <div class="row">
            <div class="col-md-5 col-sm-6">
              <!-- heading -->
              <h3>Contact Form</h3>
              <form role="form" id="contactForm" method="post">
                <div class="form-group">
                  <label for="contactName">Name</label>
                  <input class="form-control" type="text" id="contactName" name="contactName"placeholder="Enter Name" />
                </div>
                <div class="form-group">
                  <label for="contactEmail">Email</label>
                  <input class="form-control" type="email" id="contactEmail" name="contactEmail" placeholder="Enter Email" />
                </div>
                <div class="form-group">
                  <label for="contactMessage">Message</label>
                  <textarea class="form-control" id="contactMessage" name="contactMessage" rows="3" placeholder="Enter Message"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" name="submit" id="submit" class="btn btn-default">Send Message</button>
                </div>
              </form>
            </div>
            <div class="col-md-3 col-sm-6">
              <!-- heading -->
              <h3>Address</h3>
              <!-- paragraph -->
              <p class="address">#91/56 New Road Building,<br>
                Near Land-Mark Society,<br>
                London Uk - 234322</p>
                <br>
              <!-- heading -->
              <h3>Phone</h3>
              <!-- paragraph -->
              <p class="address">+353 123 456789</p>
                <br>
              <!-- heading -->
              <h3>Email</h3>
              <!-- paragraph -->
              <p class="address"><a href="#">example@example.ie</a></p>
            </div>
            <div class="col-md-4">
              <img class="img-responsive map" src="{{ asset('web_assets/img/map.jpg') }}" alt="" />
            </div>
          </div>
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
  });
</script>
@endsection
