   <div class="container">
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary float-end"  data-bs-toggle="modal" data-bs-target="#createAppointment">
         <i class="fa fa-plus"></i> Add Category
       </button>

       <!-- Modal -->
       <div class="modal fade" id="createAppointment" tabindex="-1" aria-labelledby="createAppointmentModalLabel" aria-hidden="true" wire:ignore.self data-backdrop="false">
         <div class="modal-dialog">
             <form autocomplete="off" wire:submit.prevent='addCategory()' >
                 <div class="modal-content">
                     <div class="modal-header" style="background-color: cornflowerblue">
                         <h1 class="modal-title fs-5 text-dark" id="createAppointmentModalLabel">Create Category</h1>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                         <form>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" wire:model.defer='category'>
                                <label for="category" class="col-form-label">category:</label>
                                @error('category')
                                <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                             <div class="form-floating mb-3">
                                 <input type="text" class="form-control @error('remarks') is-invalid @enderror" id="remarks" wire:model.defer='remarks'>
                                 <label for="remarks" class="col-form-label">remarks:</label>
                                 @error('remarks')
                                 <p class="invalid-feedback">{{$message}}</p>
                                 @enderror
                             </div>
                         </form>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary" id="save_btn">Add Category</button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
    </div>
    <style>
        .modal-backdrop{
            display: none;
        }
    </style>

