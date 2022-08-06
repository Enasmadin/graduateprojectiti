@extends('admin.layouts.master')
@section('css')
@toastr_css
@section('title')
توصيلة - المستخدمين الجدد
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> عرض المستخدمين الجدد</h4>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

      <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <!-- add Grade -->

          <div class="card-body">

<!-- errors -->
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- end errors -->


<br><br>
       <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>الاسم</th>
                      <th>الايميل</th>
                      <th>النوع</th>
                      <th>role</th>
                      <th>الصورة الشخصية</th>
                      <th>صورة البطاقة الامامية</th>
                      <th>الصورة البطاقة الخلفية</th>
                      <th> المدينة </th>
                      <th> رقم الموبايل </th>
                      <th>action</th>
                  </tr>
              </thead>
              <tbody>


    @foreach($users as $user)

   <tr>
   <td>{{$loop->iteration}}</td>
   <td>{{$user->name}}</td>
   <td>{{$user->email}}</td>
   <td>{{$user->gender}}</td>
   <td>{{$user->role}}</td>
   <td><img class="card-img-top" src="{{ asset('profilepic') . '/' . $user->profile_pic }}" alt=""></td>
<td><img class="card-img-top" src="{{ asset('nationalidpic') . '/' . $user->national_id_first_pic }}" alt=""></td>
<td><img class="card-img-top" src="{{ asset('nationalidpic') . '/' . $user->national_id_second_pic }}" alt=""></td>
<td>{{$user->city}}</td>
<td>{{$user->phone_number}}</td>




<td>
<form action="{{ route('users.update', $user->id) }}" method="post" class="mb-3">

@method('PUT')
                    @csrf
                    <label>الحالة</label>
     <select class="form-control" name="status">

         <option value="accepted">قبول</option>
         <option value="refused">رفض</option>

     </select>
     <button type="submit" class="btn btn-danger">حفظ</button>
</form>
</td>
</tr>



</div>
<div class="modal-body">
    <!-- edit form   here -->

</div>
</div></div>


<!-- delete modal -->
<!-- Button trigger modal -->

<!-- Modal -->

    </div>
  </div>
</div>





<!-- end delete modal -->
   </tbody>


    @endforeach

           </table>
          </div>
          </div>

        </div>
      </div>
    <!-- here -->

<!-- finished -->
  </div>
<!-- row closed -->
@endsection
@section('js')

@endsection
