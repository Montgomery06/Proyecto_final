<x-app-layout>

    <x-slot name="header">
        <div class="row">
            <div class="col-8">        
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }} 
            </h2>
        </div>
            <div class="col-4">
                <button class="btn btn-secondary float-right" data-toggle="modal" data-target="#addUser">
                    Add user
                </button>
            </div>
        </div>



    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <table class="table table-striped table-bordered">
                  <thead class="thead-dark ">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (isset($users) && count($users)>0)
                    @foreach ($users as $user)
                    @if($user->role_id==2)
                    <tr>
                      <th scope="row">
                        {{ $user->id }}
                      </th>
                      <td> {{ $user->name }} </td>
                      <td> {{ $user->email }} </td>
                      <td>

                        
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown"> 

                          <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                              <a onclick="edit({{ $user->id }},'{{ $user->name }}','{{ $user->email }}')" data-toggle="modal" data-target="#editUser" class="dropdown-item" href="#">
                                Edit
                              </a>
                               <a onclick="remove({{ $user->id }})"  class="dropdown-item" href="#">
                                Remove
                              </a>
                              
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr> 
                    @endif
                    @endforeach
                    @endif 
                  </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="modal fade" id="addUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method="post" action="{{ url('users') }}" onsubmit="return validateAdd()" >
          @csrf
      

          <div class="modal-body">
            
            <div class="form-group">
            <label for="exampleInputEmail1">
              Name
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control" placeholder="Name example" aria-label="Category example" aria-describedby="basic-addon1"  name="name" required="">
          </div>
         </div>

         <div class="form-group">
            <label for="exampleInputEmail1">
              Email
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="email" class="form-control" placeholder="user@gmail.com" aria-label="Category example" aria-describedby="basic-addon1"  name="email" required="">
          </div>
         </div>

          <div class="form-group">
            <label for="exampleInputEmail1">
              Password
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="password" class="form-control" placeholder="password" aria-label="Category example" aria-describedby="basic-addon1"  name="password" id="password" required="">
          </div>
         </div>

          <div class="form-group">
            <label for="exampleInputEmail1">
              Repeat password
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="password" class="form-control" placeholder="password" aria-label="Category example" aria-describedby="basic-addon1"  name="password2" id="password2" required="">
          </div>
         </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Cancel
            </button>
            <button type="submit" class="btn btn-primary">
              Update data
            </button>
          </div>

        </form>

      </div>
    </div>
  </div> 

  <div class="modal fade" id="editUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method="post" action="{{ url('users') }}" onsubmit="return validateAdd()" >
          @csrf
          @method('PUT')
      

          <div class="modal-body">
            
            <div class="form-group">
            <label for="exampleInputEmail1">
              Name
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control" placeholder="Name example" aria-label="Category example" aria-describedby="basic-addon1"  name="name" id="name" required="">
          </div>
         </div>

         <div class="form-group">
            <label for="exampleInputEmail1">
              Email
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="email" class="form-control" placeholder="user@gmail.com" aria-label="Category example" aria-describedby="basic-addon1"  name="email" id="email" required="">
          </div>
         </div>

          <div class="form-group">
            <label for="exampleInputEmail1">
              Password
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="password" class="form-control" placeholder="password" aria-label="Category example" aria-describedby="basic-addon1"  name="password" id="passwordEdit">
          </div>
         </div>

          <div class="form-group">
            <label for="exampleInputEmail1">
              Repeat password
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="password" class="form-control" placeholder="password" aria-label="Category example" aria-describedby="basic-addon1"  name="password2" id="password2Edit">
          </div>
         </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Cancel
            </button>
            <button type="submit" class="btn btn-primary">
              Update data
            </button>
            <input type="hidden" name="id" id="id" >
          </div>

        </form>

      </div>
    </div>
  </div> 


    <x-slot name="scripts">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">

      function edit(id,name,email){
        $("#id").val(id)
        $("#name").val(name)
        $("#email").val(email)
      }

      function remove(id){
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
          axios({
            method: 'delete',
            url: '{{ url('users')}}',
            data: {
              id: id,
              _token: '{{ csrf_token() }}'
            }
          }).then(function (response){
            console.log(response.data)
          });
          } else {
            swal("Your file is safe!");
          }
        });

        console.log(id)
      }
        
        function validateAdd(){
        var password = document.getElementById('password').value
        var password2  = document.getElementById('password2').value
        if(password!=password2){
          swal("Las contraseñas no coinciden", " ", "error");
          $('#password').addClass('is-invalid');
          $('#password2').addClass('is-invalid');       
          return false;
        }else{
           
          return true;
        }  
    
      }

     </script>
    </x-slot>

</x-app-layout>