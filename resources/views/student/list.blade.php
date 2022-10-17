
@extends('layouts.app')

@section('title','Students')

@section('content')

<div>
  <Button type="button" class="btn btn-success" >
      <a href="student/create"style="color:white;">
        add student

      </a>
  </Button>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">fulname</th>
      <th scope="col">birthday</th>
      <th scope="col">address</th>
      <th>edit</th>
      <th>delete</th>
      <th>detail</th>
    </tr>
  </thead>
  
  <tbody>
    @if (count($students) <= 0)
    @else
        @foreach($students as $student)
            <tr>
                <th>{{$student->id}}</th>
                <th>{{$student->fullname}}</th>              
                <th>{{$student->birthday}}</th>
                <th>{{$student->address}}</th>
                <th><button   type="button" class="btn btn-primary"><a href="/edit-student/{{$student->id}}">edit</a></button></th></button></th>
                <th><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" onClick='showModel({!! $student->id !!})'>delete</button></th>
                <th><button type="button" class="btn btn-info">
                <a href="/student/{{$student->id}}">detail</a></button></th>
            </tr> 
           
        @endforeach  
    @endif
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <p>Are you sure to delete this ?</p>
        </div>
        <div class="modal-footer">
          <button id="yesBtn" type="button-primary" >yes</button>
          <button type="button" class="close" data-dismiss="modal">No</button>
        </div>
      </div>
      
    </div>
  </div>
    </tbody>
    <script>
      let idStudent;
      const DelBtn = document.querySelector('#yesBtn')
      console.log(DelBtn)
      const myModal = document.querySelector('#myModal')
      function showModel(id){
        idStudent = id
      }
      DelBtn.addEventListener('click', function(){
        console.log(idStudent)
        location.assign(`http://127.0.0.1:8000/delete-student/${idStudent}`);
        document.body.classList.remove('modal-open');
        myModal.classList.remove("show");
        myModal.style.display = "none";
        document.querySelector('.modal-backdrop').classList.remove("show");
      })

    </script>
</table>
@endsection

