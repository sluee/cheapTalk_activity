<div>
<h1 class="text-white text-center">List of Post</h1>
    <hr>
        <div class="row mb-2 ">
            <div class="col" >
                <select class="form-select " wire:model.lazy='sort_post'>
                    <option value="all">All category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Search" wire:model='search'>
            </div>
        </div>

<div class="row" style="opacity: 80%;" >
    @foreach ($posts as $post )
    <div class="col-md-4 sm-4 mb-3">
        <div class="card">
            <div class="card-header" style="background-color: cornflowerblue">
                <h4>{{$post->author}}</h4>
                {{-- //delete Modal --}}
                <button class="btn btn-danger float-end " data-bs-toggle="modal" data-bs-target="#deleteAppointment" wire:click='deleteConfirmation({{$post->id}})'> <i class="fa-solid fa-trash"></i></button>
                <div wire:ignore.self class="modal fade" id="deleteAppointment" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Post</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark">
                                <h4>Are you sure you want to delete this Post?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" wire:click ="deletePostData()" >Delete Appoinment</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#updateModal" wire:click='editConfirmation({{$post->id}})'>
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
                                <form >
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" wire:model.defer='author'>
                                        <label for="author" class="col-form-label">Author:</label>
                                        @error('author')
                                        <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                     <select class="form-select "id ="category @error('category') is-invalid @enderror" wire:model.lazy='cat_id'>
                                         <option value=""hidden="true">Select Category</option>
                                         <option value=""disabled>Select Category</option>
                                         @foreach ($categories as $category )
                                             <option value="{{$category->id}}">{{$category->category}}</option>
                                         @endforeach
                                     </select>
                                     <label for="category"> Category</label>
                                     @error('cat_id')
                                         <p class="invallid-feedback">{{$message}}</p>
                                     @enderror
                                     </div>
                                     <div class="form-floating mb-3">
                                         <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model.defer='title'>
                                         <label for="title" class="col-form-label">Title:</label>
                                         @error('title')
                                         <p class="invalid-feedback">{{$message}}</p>
                                         @enderror
                                     </div>
                                     <div class="form-floating mb-3">
                                         <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content" wire:model.defer='content' style="height: 200px"></textarea>
                                         <label for="content" class="col-form-label">content:</label>
                                         @error('content')
                                         <p class="invalid-feedback">{{$message}}</p>
                                         @enderror
                                     </div>
                                 </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" wire:click.prevent ="update()" >Update Post</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-body bg-dark text-white" >
                <h5 class="text-center"> Title: {{$post->title}}</h5>
                <p>Category: {{$post->category->category}}</p>
                <p>Content: {{$post->content}}</p>
            </div>
            <div class="card-footer sm-2">
                <p class="float-end">Created: {{$post->created_at->format('g:i A')}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
    {{$posts->links()}}

<style>
.modal-backdrop{
        display: none;
}
</style>
