



</style>

<section class="content-header">

	<div class="container-fluid">
		<div class="row">
			
			<div class="col-md-12">
				
				<label for="customer"> Customer Name <span class="asterisks"><strong>*</strong></span></label>
				
         
				<select name="customer" id="customer"  class="form-control select2" style="width: 100%;">
		    
				@foreach($inspects as $inspect)
					<option></option>
                    <option value="{{$inspect->customer->id}}" data-inspectId = "{{$inspect->id}}">{{$inspect->customer->firstname}} {{$inspect->customer->middlename}} {{$inspect->customer->lastname}} --- INS000{{$inspect->id}}</option>
                @endforeach

		        </select>
			</div>

      

		</div>
		 <br>

		@include('admin.layouts.customers')<br>
    <div class="row">
  
        <div class="col-md-12">
            <label for="service" class="labely">Service Search</label>
            <select name="service[]" class="form-control select2 service" multiple="multiple" style="width: 100%;">
                <option value=""></option>
                 @foreach($services as $service)
                      <option value="{{$service->id}}">{{$service->name}} </option>
                  @endforeach
            </select>
        </div>


    </div>
		

		<br>

    <div class="row">
  
        <div class="col-md-12">
            <label for="start_date" class="labely">Start Date</label>
            <input type="date" name="start" id="start" class="form-control" required>
        </div>


    </div>
    

    <br>

  </div>
</section>


	
@section('scripts-include')

    <!-- DataTables -->
  <script src="{{asset ('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset ('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
  

  $(function(){
         $('.select2').select2();

    })


$(function () {
      $('#job').DataTable()
     
    });

</script>


<script>
	
	$(document).ready(function(){

    $(document).on('change', '#customer', function(event){


      var customerId = $('#customer option:selected').val();


      var parent = $(this).parent();

      console.log(customerId);

      var op = "";

      var ops = "";



      //console.log(customerId);

      $.ajax({

        type:"GET",
        url: '{!!URL('findCustomer')!!}',
        data:{ 'id': customerId }, 
        dataType: 'json',
        success:function(data){

          
         " "+
          $('#lastname').val(data.lastname);
          $('#firstname').val(data.firstname);
          $('#middlename').val(data.middlename);
          $('#barangay').val(data.barangay);
          $('#street').val(data.street);
          $('#city').val(data.city);
          $('#email').val(data.email);
          $('#contact').val(data.contact);
          $('#plate').val(data.plate_number);
          $('#model').val(data.brand).val(data.model);


          op+= '<option selected disabled value ="'+data.service_id+'">' +data.name+'</option>';
          $('.service').append(op).prop('disabled', false);

          ops+= '<option selected disabled value ="'+data.technian_id+'">'+ data.firstName +" "+data.middleName+ " " +data.lastName+'</option>';
          $('.technician').append(ops).prop('disabled', false);


          console.log(data);


        },
        error:function(data){
          alert("MAMA MO ERROR");
        }

      });


      
    });
});


</script>



<script>
  
  $(document).ready(function(){

    $(document).on('change', '#services', function(){

       var service_id = $('#services option:selected').val();

       console.log(service_id);


       $.ajax({

                type: 'GET',
                url: '{!!URL('servicePar')!!}',
                data: {'service_id': service_id},
                dataType: 'json',
                success:function(data){
                    alert("success");
                    console.log(data);
                },
                error:function(data){
                  alert("ERROR!!!");
                }
       });
    });
  });

</script>


@endsection