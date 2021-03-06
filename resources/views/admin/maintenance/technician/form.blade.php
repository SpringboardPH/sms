

<style>
    .asterisks{
        color: red;
    }
    .labely{
        margin-top: 10px;
    }
    #forms{
        margin-bottom: 20px;
    }

    #tech-pic{
        margin-top: 10px;
        margin-left: 450px;
    }

    .form{
        margin-left: 400px;
        margin-top:  
    }

</style>


<div class="row">
    <div class="col-md-4">
        <label for="lastname">Lastname</label><span class="asterisks"><strong>*</strong></span>
            <input 
                class="form-control align-center" 
                placeholder="Lastname" 
                maxlength="50" 
                required 
                name="lastname" 
                type="text"
                id="lastname"
                value="{{ isset($technician->lastName) ? $technician->lastName : old('lastName') }}">
    </div>

    <div class="col-md-4">
        <label for="firstname">Firstname</label><span class="asterisks"><strong>*</strong></span>
            <input 
                class="form-control align-center" 
                placeholder="Firstname" 
                maxlength="50" 
                required 
                name="firstname" 
                type="text"
                id="firstname"
                value="{{ isset($technician->firstName) ? $technician->firstName : old('firstName') }}">

    </div>

    <div class="col-md-4">
        <label for="firstname">Middlename</label><span class="asterisks"><strong>*</strong></span>
             <input 
                class="form-control align-center" 
                placeholder="Middlename" 
                maxlength="50" 
                required 
                name="middlename" 
                type="text"
                id="middlename"
                value="{{ isset($technician->middleName) ? $technician->middleName : old('middleName') }}">
    </div>
</div>


<div class="row">
    <div class="col-md-4">
       <label for="street" class="labely">Street</label><span class="asterisks"><strong>*</strong></span>
              <input 
                class="form-control align-center" 
                placeholder="Street" 
                maxlength="50" 
                required 
                name="street" 
                type="text"
                id="street"
                value="{{ isset($technician->Street) ? $technician->Street : old('Street') }}">

    </div>

    <div class="col-md-4">
        <label for="street" class="labely">Barangay</label><span class="asterisks"><strong>*</strong></span>
              <input 
                class="form-control align-center" 
                placeholder="Barangay" 
                maxlength="50" 
                required 
                name="barangay" 
                 type="text"
                id="barangay"
                value="{{ isset($technician->Barangay) ? $technician->Barangay : old('Barangay') }}">
    </div>

    <div class="col-md-4">
        <label for="city" class="labely">City</label><span class="asterisks"><strong>*</strong></span>
              <input 
                class="form-control align-center" 
                placeholder="City" 
                maxlength="50" 
                required 
                name="city" 
                type="text"
                id="city"
                value="{{ isset($technician->City) ? $technician->City : old('City') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <label for="birthdate" class="labely">Birthdate</label><span class="asterisks"><strong>*</strong></span>
            <input 
                class="form-control align-center" 
                min="1960-01-01" max="2000-12-12"
                placeholder="Birthdate" 
                maxlength="50" 
                required 
                name="birthdate" 
                type="date"
                id="birthdate"
                value="{{ isset($technician->Birthdate) ? $technician->Birthdate : old('Birthdate') }}">
    </div>

    <div class="col-md-4">
        <label for="contact" class="labely">Contact Number</label><span class="asterisks"><strong>*</strong></span>
            <input 
                class="form-control align-center" 
                placeholder="Contact Number" 
                maxlength="50" 
                required 
                name="contact" 
                type="text"
                id="contact"
                value="{{ isset($technician->Contact) ? $technician->Contact : old('Contact') }}">
    </div>

    <div class="col-md-4">
        <label for="email" class="labely">Email Address</label><span class="asterisks"><strong>*</strong></span>
            <input 
                class="form-control align-center" 
                placeholder="Email Address" 
                maxlength="50" 
                required 
                name="email" 
                type="email"
                id="emails"
                value="{{ isset($technician->Email) ? $technician->Email : old('Email') }}">
    </div>
</div>

<div class="row">
    
      <div class="col-md-4">
            <div class="row">
                <center><img class="img-responsive" id="tech-pic" src="{{asset ('dist/img/avatar.png')}}" style="max-width:150px; background-size: contain" /></center>
                <center class="form">
                            
                            {!! Form::file('image',[
                                'class' => 'form-control',
                                'name' => 'image',
                                'class' => 'btn btn-success btn-sm',
                                'onchange' => 'readURL(this)']) 
                            !!}
                </center>
            </div>
        </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="specializations" class="labely">Specialization</label><span class="asterisks"><strong>*</strong></span>
            <select 
                name="specializations[]" 
                class="form-control select2"
                id="form" 
                multiple= "multiple"
                required
                
                data-placeholder="Select Specialization"
                >
                <option></option>
                 @foreach($categories as $category)
                <option style="width: 100%; color:blue"
                    value="{{ $category->id }}"
                    @if( old('specializations') )
                        @if( in_array( $category->id, old('specializations') ) )
                        selected
                        @endif    
                    @elseif(
                        isset( $technician->specializations_id ) && 
                        count( $technician->specializations_id ) > 0 && 
                        in_array( $category->id, $technician->specializations_id ) )
                        selected
                    @endif
                    >
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>





@section('scripts-include')

<script>
    $(function(){
         $('.select2').select2();

    })
</script>

@endsection
