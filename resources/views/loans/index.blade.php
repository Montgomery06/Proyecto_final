<x-app-layout>

    <x-slot name="header">
        <div class="row">
            <div class="col-8">        
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Loans') }} 
            </h2>
        </div>

            <div class="col-4">
                <button class="btn btn-secondary float-right" data-toggle="modal" data-target="#addLoan">
                    Add loan
                </button>
            </div>
          </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

               <!-- <div>{{ Auth::user()->id }}</div> -->
                <table class="table table-striped table-bordered">
                  <thead class="thead-dark ">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">User</th>
                      <th scope="col">Movie</th>
                      <th scope="col">Loan</th>
                      <th scope="col">Return</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (isset($loans) && count($loans)>0)
                    @foreach ($loans as $loan)
                    
                    <tr>
                      <th scope="row">
                        {{ $loan->id }}
                      </th>
                      <td> {{ $loan->user_id }} </td>
                      <td> {{ $loan->movie_id }} </td>
                      <td> {{ $loan->loan_date }} </td>
                      <td> {{ $loan->return_date }} </td>
                      <td> {{ $loan->status }} </td>
                      <td>

                        
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown"> 

                          <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                              <a onclick="edit({{$loan->id}},{{ $loan->user_id }},{{ $loan->movie_id }},'{{ $loan->loan_date }}','{{ $loan->return_date }}','{{ $loan->status }}')" data-toggle="modal" data-target="#editLoan" class="dropdown-item" href="#">
                                Edit
                              </a>
                               <a onclick="remove({{$loan->id}})"  class="dropdown-item" href="#">
                                Remove
                              </a>
                              <!--
                              <a onclick=""  class="dropdown-item" href="#">
                                Return
                              </a>
                              -->
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr> 
                   
                    @endforeach
                    @endif 
                  </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="modal fade" id="addLoan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add loan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method="post" action="{{ url('loans') }}" >
          @csrf
      

         <div class="modal-body">
            
         <div class="form-group">
            <label for="exampleInputEmail1">
              User
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <select class="form-control" name="user_id">
              @if (isset($users) && count($users)>0)
              @foreach ($users as $user)

              <option value="{{ $user->id }}"> {{ $user->name }}</option>

              @endforeach
              @endif
            </select>
          </div>
         </div>

         <div class="form-group">
            <label for="exampleInputEmail1">
              Movie
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <select class="form-control" name="movie_id">
              @if (isset($movies) && count($movies)>0)
              @foreach ($movies as $movie)

              <option value="{{ $movie->id }}"> {{ $movie->title }}</option>

              @endforeach
              @endif
            </select>
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
            <input type="hidden" name="loan_date" id="loan_date" value="{{date('Y-m-d H:i:s')}}">
          </div>
        </form>

      </div>
    </div>
  </div> 
    
  <div class="modal fade" id="editLoan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit loan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method="post" action="{{ url('loans') }}" >
          @csrf
          @method('PUT')

         <div class="modal-body">
            
         <div class="form-group">
            <label for="exampleInputEmail1">
              User
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <select class="form-control" name="user_id" id="user_id">
              @if (isset($users) && count($users)>0)
              @foreach ($users as $user)

              <option value="{{ $user->id }}"> {{ $user->name }}</option>

              @endforeach
              @endif
            </select>
          </div>
         </div>

         <div class="form-group">
            <label for="exampleInputEmail1">
              Movie
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <select class="form-control" name="movie_id" id="movie_id">
              @if (isset($movies) && count($movies)>0)
              @foreach ($movies as $movie)

              <option value="{{ $movie->id }}"> {{ $movie->title }}</option>

              @endforeach
              @endif
            </select>
          </div>
         </div>

        <div class="form-group">
            <label for="exampleInputEmail1">
              Loan date
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="datetime" class="form-control" placeholder="{{date('Y-m-d H:i:s')}}" aria-label="Category example" aria-describedby="basic-addon1"  name="loan_date" id="loan_date" required="">
          </div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">
              Return date
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="datetime" class="form-control" placeholder="{{date('Y-m-d H:i:s')}}" aria-label="Category example" aria-describedby="basic-addon1"  name="return_date" id="return_date" required="">
          </div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">
              Status
            </label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <select class="form-control" name="status" id="status">
              <option>Prestado</option>
              <option>Devuelto</option>
            </select>
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
            <input type="hidden" name="id" id="id">
          </div>
        </form>

      </div>
    </div>
  </div> 


    <x-slot name="scripts">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">

     function edit(id,user_id,movie_id,loan_date,return_date,status){
        $("#user_id").val(user_id)
        $("#movie_id").val(movie_id)
        $("#loan_date").val(loan_date)
        $("#return_date").val(return_date)
        $("#status").val(status)
        $("#id").val(id)
      }

      function remove(id){
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
          axios({
            method: 'delete',
            url: '{{ url('loans')}}',
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
      }



     </script>
    </x-slot>

</x-app-layout>