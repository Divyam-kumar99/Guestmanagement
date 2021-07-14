  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- <div class="float-right d-none d-sm-inline">
      Anything you want
    </div> -->
    <!-- Default to the left -->
    <div     class='text-center'>

    <strong>Copyright &copy; 2021 <a href="#">Guest-management</a>.</strong> All rights reserved.
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url()?>public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url()?>public/admin/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url()?>public/admin/plugins/summernote/summernote-bs4.js"></script>
<script>
  $(document).ready(function(){
    setInterval(getnotification,3000);
    function getnotification(){
      $.ajax({
        type:"post",
        url:"<?=base_url('admin/employee/notification')?>",
        dataType:"json",
        success: function(result){
          // console.log(result);
          if (result['count']>0) {
            // console.log(result);
            $('#count').html(result['count']);
            temp=[];
            result['visitors'].forEach(visitor => {
             temp=temp + `<a class="dropdown-item" href="/Guestmanagement/admin/employee/meeting/` + visitor['emp_id'] + `" >` + visitor['name'] + ` want to meet you </a>`;
              
            });
            $('#shownotification').html(temp );  
          }
        }
      })
      $.ajax({
        type:"post",
        url:"<?=base_url('admin/reception/notification')?>",
        dataType:"json",
        success: function(result){
         console.log(result);
          if (result['count']>0) {
            
            $('#countreception').html(result['count']);
            tempreception=[];
            result['visitors'].forEach(visitor => {
             tempreception=tempreception + `<a class="dropdown-item" href="/Guestmanagement/admin/reception/meeting/` + visitor['emp_id'] + `" >` + visitor['name'] + ` approved to meet </a>`;
              
            });
            $('#shownotificationreception').html(tempreception );  
          }
        }
      })
      
      $.ajax({
        type:"post",
        url:"<?=base_url('admin/admin/notification')?>",
        dataType:"json",
        success: function(resultadmin){
          // console.log(result);
          if (resultadmin['count']>0) {
            // console.log(result);
            $('#countadmin').html(resultadmin['count']);
            tempadmin=[];
            resultadmin['visitors'].forEach(visitor => {
             tempadmin=tempadmin + `<a class="dropdown-item" href="/Guestmanagement/admin/admin/mymeeting/` + visitor['emp_id'] + `" >` + visitor['name'] + ` want to meet you </a>`;
              
            });
            $('#shownotificationadmin').html(tempadmin);  
          }
        }
      })
    }
    $('#ajaxcall1').click(function(){
        var phone= $("#phone_no").val();
        console.log(phone);
        $.ajax({
          type: "post",
          url:"<?=base_url('admin/employee/getvisitor')?>",
          data: {phone: phone},
          dataType: "json",
          success: function(visitor){
            console.log(visitor);
            objct=jQuery.isEmptyObject(visitor);
            if(objct) {
              $('#name').val(null);
              $('#address').val(null);
              $('#meet').val(null);
            }else{
              
              $('#name').val(visitor['name']);
              $('#address').val(visitor['address']);
              if (visitor['status']==2) {
                $('#purpose').val(visitor['purpose']);
              }else{
                $('#purpose').val(null);
              }
                $('#meet').val(visitor['emp_id']);
            }
          }
        })
      })
      $('#ajaxcall2').click(function(){
        var phone= $("#phone_no").val();
        // console.log(phone);
        $.ajax({
          type: "post",
          url:"<?=base_url('admin/reception/getvisitor')?>",
          data: {phone: phone},
          dataType: "json",
          success: function(visitor){
            console.log(visitor);
            objct=jQuery.isEmptyObject(visitor);
            if(objct) {
              $('#name').val(null);
              $('#address').val(null);
              $('#meet').val(null);
            }else{
              
              $('#name').val(visitor['name']);
              $('#address').val(visitor['address']);
              if (visitor['status']==2) {
                $('#purpose').val(visitor['purpose']);
              }else{
                $('#purpose').val(null);
              }
                $('#meet').val(visitor['emp_id']);
            }
          }
        })
      })
  
      $('#ajaxcall').click(function(){
        var phone= $("#phone_no").val();
        console.log(phone);
        $.ajax({
          type: "post",
          url:"<?=base_url('admin/admin/getvisitor')?>",
          data: {phone: phone},
          dataType: "json",
          success: function(visitor){
            console.log(visitor);
            objct=jQuery.isEmptyObject(visitor);
            if(objct) {
              $('#name').val(null);
              $('#address').val(null);
              $('#meet').val(null);
            }else{
              
              $('#name').val(visitor['name']);
              $('#address').val(visitor['address']);
              if (visitor['status']==2) {
                $('#purpose').val(visitor['purpose']);
              }else{
                $('#purpose').val(null);
              }
              $('#meet').val(visitor['emp_id']);
            }
          },
          error: function (error) {
          alert('error; ' + eval(error));
          }
        })
      })   
  
  
  // $(".status22").click(function(target){
      //   console.log("#"+ target['currentTarget']['id']);// gives the id of the current targetted class 
        
      //   status=$("#"+ target['currentTarget']['id']).val();
      //   console.log(status);
      // })
  
  })
  function changestatus(id){//id here is visitor id  

    status=document.getElementById("status"+id).value
    console.log(status); 
    console.log("hello id=" + id );
    if (status==0 || status==1||status==3) {
      $.ajax({
        type: "post",
        url:"<?=base_url('admin/employee/update')?>",
        data:{id: id , status: status},
        dataType: "json",
        success: function(success){
        // $('#change' +id ).html(success);
          // console.log(success);
          if (status==0) {
            // console.log('hellostatus=0');
            $('#change'+id).html(`<span class="badge badge-info px-2 py-1">Awating Approval</span>`);
          } else if(status==1){
            // console.log('hellostatus=1');
            $('#change'+id).html(`<span class="badge badge-success px-2 py-1">Ongoing</span>`);
          }else if(status==3){
            // console.log('hellostatus=3');
            $('#change'+id).html(`<span  class="badge badge-danger px-2 py-1">Cancelled</span>`);
          
          }
        }
      })
    }else{
    
        $('#schedulemodal'+id).modal("show");
      
  }
    
  }
  function changestatusadmin(id){//id here is visitor id  

    status=document.getElementById("status"+id).value
    console.log(status); 
    console.log("hello id=" + id);
    if (status==0 || status==1||status==3) {
      $.ajax({
        type: "post",
        url:"<?=base_url('admin/admin/update')?>",
        data:{id: id , status: status},
        dataType: "json",
        success: function(success){
        // $('#change' +id ).html(success);
          // console.log(success);
          if (status==0) {
            // console.log('hellostatus=0');
            $('#change'+id).html(`<span class="badge badge-info px-2 py-1">Awating Approval</span>`);
          } else if(status==1){
            // console.log('hellostatus=1');
            $('#change'+id).html(`<span class="badge badge-success px-2 py-1">Ongoing</span>`);
          }else if(status==3){
            // console.log('hellostatus=3');
            $('#change'+id).html(`<span  class="badge badge-danger px-2 py-1">Cancelled</span>`);
          
          }
        }
      })
    }else{
    
        $('#schedulemodal'+id).modal("show");
      
  }


  }
</script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#tabledata').DataTable();

    });
  </script>
</body>
</html>
