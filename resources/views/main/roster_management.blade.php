@extends('layout.master')

@section('content')

@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif





<!-- Button trigger modal -->



<div class="row mt-5 ">
  <div class="col-12 d-flex justify-content-end ">
    <button type="button" class="btn btn-success justify-content-end hideOnMobile" data-bs-toggle="modal" data-bs-target="#exampleModal">
      เพิ่มรายชื่อ
    </button>
  </div>
</div>

<div class="row mt-3 ">
  <div class="col border rounded-2 hideOnMobile">
    <table class="table" id="myTable" >
      <thead>
        <tr>
          <th scope="col" class="text-center">ID</th>
          <th scope="col" class="text-center">ชื่อนามสกุล</th>
          <th scope="col" class="text-center">เลขบัตรประชาชน</th>
          <th scope="col" class="text-center">สถานะ</th>
          <th scope="col" class="text-center">โน๊ต</th>
          <th scope="col" class="text-center">แก้ไข</th>
          <th scope="col" class="text-center">ลบ</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($roster as $item)
            <tr >
              <td class="text-center">{{$item->id}}</td>
              <td class="text-center">{{$item->name}}</td>
              <td class="text-center">{{$item->identity_card_number}}</td>
              <td class="text-center">{{$item->Status->name}}</td>
              <td class="text-center"><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#description_btn_{{$item->id}}">ดูโน๊ต</button></td>
              <td class="text-center"><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_data_btn{{$item->id}}">แก้ไข</button></td>
              <td class="text-center"><button class="btn btn-danger" onclick="deleteBtn(`{{route('delete_roster',$item->id)}}`)">ลบ</button></td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
  
  <!-- Modal -->
  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">แบบฟอร์มกรอกข้อมูลรายชื่อ</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('store_roster')}}" method="POST" >
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">ชื่อ - นามสกุล</label>
            <input type="text" class="form-control" name="name" id="">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">รหัสบัตรประชาชน</label>
            <input type="number" class="form-control" name="identity_card_number" id="">
            </div>

            <div class="mb-3">
              <select class="form-select" name="status" id="">
                <option value="1">WhiteList</option>
                <option value="2">blackList</option>
              </select>
            </div>
            
            <div class="mb-3">
              <label for="" class="form-label">โน๊ต</label>
            <textarea class="form-control" name="description" id="" cols="18" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
          </form>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Button trigger modal -->


  @foreach ($roster as $item)
<div class="modal fade" id="edit_data_btn{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('editRoster',$item->id)}}" method="POST" >
          @csrf
          <div class="mb-3">
          <label for="" class="form-label">ชื่อ - นามสกุล</label>
          <input type="text" class="form-control" name="name" value="{{$item->name}}" id="">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">รหัสบัตรประชาชน</label>
          <input type="number" class="form-control" name="identity_card_number" value="{{$item->identity_card_number}}" id="">
          </div>
          <div class="mb-3">
            <select value="{{$item->Status->name}}" class="form-select" name="status" id="">
              <option value="1">WhiteList</option>
              <option value="2">blackList</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">โน๊ต</label>
          <textarea class="form-control" name="description" id="" cols="18" rows="5">{{$item->description}}</textarea>
          </div>
          <button type="submit" class="btn btn-success">บันทึก</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
  


  
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    responsive: true
    } );

    $(document).ready( function () {
    $('#myTableMobile').DataTable();
    responsive: true
    } );

    
    


  </script>





<!-- Modal -->

@foreach ($roster as $item)
<div class="modal fade" id="description_btn_{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">โน๊ต</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label fs-5">ชื่อ : </label><span> {{$item->name}}</span>
        </div>
        <div class="mb-3">
          <label class="form-label fs-5">รหัสบัตรประชาชน : </label><span> {{$item->identity_card_number}}</span>
        </div>
        <div class="mb-3">
          <label class="form-label fs-5">สถานะ : </label><span> {{$item->Status->name}}</span>
        </div>
        <div class="mb-3">
          <label class="form-label fs-5">คำอธิบาย : </label> <span> {{$item->description}}</span>
        </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
@endforeach


{{-- Mobile  --}}

<div class="container hideonDesktop">
  
  <table class="table" id="myTableMobile">
    <thead>
      <tr>
        <th>ชื่อ</th>
        <th>ชื่อ</th>
        <th>ชื่อ</th>
      </tr>
    </thead>
    @foreach( $roster as $item)
    <tr>
      <td>{{$item->name}}</td>
      <td>
        <div class="dropdown">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#description_btn_{{$item->id}}">ดูโน๊ต <i class="bi bi-eye-fill"></i></button>
        
      </div></td>
      <td >
        <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          จัดการ
        </button>
        <ul class="dropdown-menu">
          <li></li>
          <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-toggle="dropdown" data-bs-target="#edit_data_btn{{$item->id}}">แก้ไข</button></li>
          <li><button class="dropdown-item" onclick="deleteBtn(`{{route('delete_roster',$item->id)}}`)">ลบ</button></li>
        </ul>
      </div></td>
    </tr>
    @endforeach
  </table>
</div>

@endsection