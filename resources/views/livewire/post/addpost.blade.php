<div class="col-md-5  mx-auto">
    <div class="card p-2 bg-dark " style="opacity:85%" >
        <div class="card-header text-white">
            Create Post
        </div>
        <div class="card-body">
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
            <div class="modal-footer">
                <a href="/" class="btn btn-secondary "> Cancel </a>
                <button type="submit" class="btn btn-primary m-2" wire:click='addPost' id="save_btn">Post</button>
            </div>
        </div>
    </div>
</div>
