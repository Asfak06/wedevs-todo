load();
function load(){
      var rd="rd";
      $.ajax({
        url:"src/process.php",
        type:"post",
        data:{rd:rd},
        success:function(data){
           $('.todo').html(data);
           anyCompleted();
           $('#all').addClass('border-dark');
           $('#active').removeClass('border-dark');
           $('#completed').removeClass('border-dark');
        }
      });  
}
function loadActive(){
      var la="la";
      $.ajax({
        url:"src/process.php",
        type:"post",
        data:{load_active:la},
        success:function(data){
           $('.todo').html(data);
           anyCompleted();
        }
      });  
}
function loadCompleted(){
      var lc="lc";
      $.ajax({
        url:"src/process.php",
        type:"post",
        data:{load_completed:lc},
        success:function(data){
            $('.todo').html(data);
            anyCompleted();
        }
      });  
}

function anyCompleted(){
      $.ajax({
        url:"src/process.php",
        type:"post",
        data:{anyCompleted:'set'},
        success:function(data){
          var res = $.parseJSON(data);
          if(res.status){
            $('#clear').show();
          }else{
            $('#clear').hide();
          }
          if (res.total>0) {
            $('.card-body').show();
            $('.card-footer').show();
          }else{
            $('.card-body').hide();
            $('.card-footer').hide();
          }
          $('#task').text(res.remains+' tasks remaining');      
        }
      });  
}
$(document).on("click", ".par", function() {
  	var z=$(this).attr('id');
  	var x=$(this).text();
  	load();
    setTimeout(function(){
    $('#'+z).replaceWith('<input id="'+z+'" class="editinput form-control mb-2" type="text" value="'+x+'" >');
    $('.editinput').focus();
    $('.editinput').prev().hide();
    $('.editinput').next().hide();
    },50);

 });

$(document).on("click", ".paractive", function() {
    var z=$(this).attr('id');
    var x=$(this).text();
    loadActive();
    setTimeout(function(){
    $('#'+z).replaceWith('<input id="'+z+'" class="editinputactive form-control mb-2" type="text" value="'+x+'" >');
    $('.editinputactive').focus();
    $('.editinputactive').prev().hide();
    $('.editinputactive').next().hide();
    },50);

 });
$(document).on("click", ".complete", function() {
    var pid=$(this).next().attr('id');
       $.ajax({
        url:"src/process.php",
        type:"post",
        data:{completed_id:pid},
        success:function(data){
           load();
        }
      });     
 });

$(document).on("click", ".delete", function() {
    var pid=$(this).prev().attr('id');
       $.ajax({
        url:"src/process.php",
        type:"post",
        data:{delete_id:pid},
        success:function(data){
           load();
        }
      });     
 });

$(document).on("click", "#clear", function() {
      $.ajax({
          url: "src/process.php",
          type: "POST",
          data: {clear: 'clear'},
          success: function (data){
            load();
          },
          error: function(){
            alert('error')
          }
      });    
 });

$(document).on("keypress", ".editinput", function(e) {
    if (e.key === "Enter") {
       var z=$(this).attr('id');
       var x=$(this).val();
        $.ajax({
          url:"src/process.php",
          type:"post",
          data:{id:z,content:x},
          success:function(data){
             load();
          }
        });   
    }
 });

$(document).on("keypress", ".editinputactive", function(e) {
    if (e.key === "Enter") {
       var z=$(this).attr('id');
       var x=$(this).val();
        $.ajax({
          url:"src/process.php",
          type:"post",
          data:{id:z,content:x},
          success:function(data){
             loadActive();
          }
        });   
    }
 });

$(document).on("mouseover", ".sect", function() {
  $(this).find('.complete').removeClass('invisible');
  $(this).find('.delete').removeClass('invisible');
});

$(document).on("mouseout", ".sect", function() {
  $(this).find('.complete').addClass('invisible');
  $(this).find('.delete').addClass('invisible');
});

$(document).ready(function(){

 $('#new').submit(function(e){
  e.preventDefault();
 	 var add=$('#addtodo').val();
   $('#addtodo').val('');
        $.ajax({
            url: "src/process.php",
            type: "POST",
            data: {newtodo: add},
            success: function (data){
            	load();
            },
            error: function(){
            	alert('error')
            }
        });
 });

  $('#all').click(function(){
    load();
  });
  $('#active').click(function(){
    loadActive();
    $('#active').addClass('border-dark');
    $('#all').removeClass('border-dark');
    $('#completed').removeClass('border-dark');
  });
  $('#completed').click(function(){
    loadCompleted(); 
    $('#completed').addClass('border-dark');
    $('#all').removeClass('border-dark');
    $('#active').removeClass('border-dark');
  });

});	