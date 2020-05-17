$(document).ready(function(){

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(document).on('click', '.pagination-for-packages a',function(event){
    event.preventDefault();
    event.stopPropagation();
    event.stopImmediatePropagation();
    var url = $(this).attr('href');
    $.ajax({
      url: url,
      type: 'get',
      dataType: 'json',
      success: function(result){
        if(result.status == 'ok'){
          $('#packages').html(result.listing);
        }else {
          alert("Error when get Pagination");
        }
      }
    });
  });

  $(document).on('click', '.pagination-for-locations a',function(event){
    event.preventDefault();
    event.stopPropagation();
    event.stopImmediatePropagation();
    var url = $(this).attr('href');
    $.ajax({
      url: url,
      type: 'get',
      dataType: 'json',
      success: function(result){
        if(result.status == 'ok'){
          $('#locations').html(result.listing);
        }else {
          alert("Error when get Pagination");
        }
      }
    });
  });

  $(document).on('click', '.pagination-for-rooms a',function(event){
    event.preventDefault();
    event.stopPropagation();
    event.stopImmediatePropagation();
    var url = $(this).attr('href');
    $.ajax({
      url: url,
      type: 'get',
      dataType: 'json',
      success: function(result){
        if(result.status == 'ok'){
          $('#rooms').html(result.listing);
        }else {
          alert("Error when get Pagination");
        }
      }
    });
  });

  $(document).on('click', '.pagination-for-seats a',function(event){
    event.preventDefault();
    event.stopPropagation();
    event.stopImmediatePropagation();
    var url = $(this).attr('href');
    $.ajax({
      url: url,
      type: 'get',
      dataType: 'json',
      success: function(result){
        if(result.status == 'ok'){
          $('#seats').html(result.listing);
        }else {
          alert("Error when get Pagination");
        }
      }
    });
  });

  $(document).on('click', '.pagination-for-task-types a',function(event){
    event.preventDefault();
    event.stopPropagation();
    event.stopImmediatePropagation();
    var url = $(this).attr('href');
    $.ajax({
      url: url,
      type: 'get',
      dataType: 'json',
      success: function(result){
        if(result.status == 'ok'){
          $('#task-types').html(result.listing);
        }else {
          alert("Error when get Pagination");
        }
      }
    });
  });
});
