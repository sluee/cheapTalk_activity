<div>
        <h1 class="text-white text-center">List of Category</h1>
        <hr>
        <table class="table table-primary table-hover table-striped text-center" style="opacity: 95%;">
            <div class="row mb-2 ">
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Search" wire:model='search'>
                </div>
            </div>
          <thead>
            <tr>
              <th>Category</th>
              <th>Remarks</th>
              <th class="text-center">...</th>
            </tr>
          </thead>
          @foreach ($categories as $category )
          <tbody >
                <td class="text-dark" >{{$category->category}}</td>
                <td>{{$category->remarks}}</td>
                <td>
                    <button type="button" class="btn btn-info " data-bs-toggle="modal" data-bs-target="#updateModal" wire:click='editConfirmation({{$category->id}})'>
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <!-- Update Investor Modal -->
                    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:cornflowerblue">
                                    <h1 class="modal-title fs-5" id="updateModalLabel">Edit Category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control  @error('category') is-invalid @enderror" id="category" wire:model.defer='editCategory'>
                                        <label for="category" class="col-form-label">Category:</label>
                                        @error('category')
                                       <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control  @error('remarks') is-invalid @enderror" id="remarks" wire:model.defer='editRemarks'>
                                        <label for="remarks" class="col-form-label">Remarks:</label>
                                        @error('remarks')
                                       <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" wire:click.prevent ="update()" >Update Category</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- //delete Modal --}}
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAppointment" wire:click='deleteConfirmation({{$category->id}})'> <i class="fa-solid fa-trash"></i></button>
                    <div wire:ignore.self class="modal fade" id="deleteAppointment" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-dark">
                                    <h4>Are you sure you want to delete this Category?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" wire:click ="deleteCategoryData()" >Delete Appoinment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
          </tbody>
          @endforeach

        </table>

        @if($categories->isEmpty())
            <div class="text-white text-center" style="font-size: 30px; font-weight:700">
                Nothing to show
            </div>
          @endif
          {{$categories->links()}}
</div>

<style>
 .modal-backdrop{
            display: none;
 }
</style>
