


  <footer class="footer   footer-white ">
    <div class="container">
      <div class="row">
        <nav class="footer-nav">
          <ul class="list-group list-group-horizontal">
           
              @foreach ($pages as $page)
              
                   <li  class="list-group-item list-group-item-dark">
                     <a href="{{route('front.page', ['id' => $page->id, 'slug' => trim(str_replace(' ', '_', $page->name))])}}">{{$page->name}}</a>
                   </li>
              @endforeach
           
          </ul>
        </nav> 
        <div class="credits ml-auto">
          <span class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script>2020, made with <i class="fa fa-heart heart"></i> by Maged-Naim
          </span>
        </div>
      </div>
    </div>
  </footer>