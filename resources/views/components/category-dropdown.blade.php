 <div class="">
     <div class="dropdown mb-4">
         <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
             aria-expanded="false">

             {{ $currentCategory ? $currentCategory->name : 'Filter by category' }}
         </button>
         <ul class="dropdown-menu">
             <li class="dropdown-item"> <a href="/" class="text-decoration-none">
                     Filter by category</a>
             </li>
             @foreach ($categories as $category)
                 <li class="dropdown-item"> <a
                         href="/?category={{ $category->slug }}{{ request('search') ? '&search='.request('search') : '' }}"
                         class="text-decoration-none">
                         {{ $category->name }}</a>
                 </li>
             @endforeach
         </ul>
     </div>
     {{-- <select name="" id="" class="p-1 rounded-pill mx-3">
        <option value="">Filter by Tag</option>
      </select> --}}
 </div>
