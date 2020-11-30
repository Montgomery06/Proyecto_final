<x-app-layout>

    <x-slot name="header">
        <div class="row">
            <div class="col-8">        
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }} 
            </h2>
        </div>
            <div class="col-4">
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#adduser">
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
                      <th scope="col">role</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (isset($users) && count($users)>0)
                    @foreach ($users as $user)
                    <tr>
                      <th scope="row">
                        {{ $user->id }}
                      </th>
                      <td> {{ $user->name }} </td>
                      <td> {{ $user->email }} </td>
                      <td> {{ $user->role_id }} </td>
                      <td>

                        <!--
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown"> 

                          <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                              <a onclick="edit({{ $user->id }},'{{ $user->name }}','{{ $user->description }}')" data-toggle="modal" data-target="#edituser" class="dropdown-item" href="#">
                                Edit
                              </a>
                               <a onclick="remove({{ $user->id }})"  class="dropdown-item" href="#">
                                Remove
                              </a>
                              
                            </div>
                          </div>
                        </div>
                        -->

                      </td>
                    </tr> 
                    @endforeach
                    @endif 
                  </tbody>
                </table>

            </div>
        </div>
    </div>



    <x-slot name="scripts">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
        

     </script>
    </x-slot>

</x-app-layout>