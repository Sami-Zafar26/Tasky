<footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">Tasky</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="col-md-5 d-flex justify-content-end">
            @isset($tasks)
           {{$tasks->links()}}
            @endisset
            </div>
            <div class="credits ml-auto">
              <span class="copyright">
                © 2023, made with <i class="fa fa-heart heart"></i> by Sami Zafar
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="{{asset('js/script.js')}}"></script>
  <script src="{{asset('./assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('./assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('./assets/js/core/bootstrap.min.js')}}"></script>
  {{-- <script src="{{asset('./assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script> --}}
  {{-- <script src="{{asset('./assets/js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script> --}}

  @stack('count')
    @stack('tinymce')
    @stack('view-task')
    @stack('editmodal')
    @stack('withdrawal')
    @stack('copy')
  {{-- <script src="{{asset('js/bootstrap.min.js')}}"></script> --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> --}}
</body>

</html>