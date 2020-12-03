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
                      <td>

                        
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown"> 

                          <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                              <a onclick="" data-toggle="modal" data-target="#editUser" class="dropdown-item" href="#">
                                Edit
                              </a>
                               <a onclick=""  class="dropdown-item" href="#">
                                Remove
                              </a>
                              
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

    


    <x-slot name="scripts">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">



     </script>
    </x-slot>

</x-app-layout>