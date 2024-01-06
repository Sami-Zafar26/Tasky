    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <!-- <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
          </div> -->
          <!-- <p>CT</p> -->
        </a>
        <a href="{{url('/')}}" class="simple-text logo-normal">
          Tasky
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="navitem">
            <a href="{{Route('all-tasks')}}" class="navlink">
              <i class="nc-icon nc-layout-11"></i>
              <p>Tasks</p>
            </a>
          </li>
          <li class="navitem">
            <a href="{{Route('myearnings')}}" class="navlink">
              <i class="nc-icon nc-money-coins"></i>
              <p>My Earnings</p>
            </a>
          </li>
          <li class="navitem">
            <a href="{{Route('completed-tasks')}}" class="navlink">
              <i class="nc-icon nc-check-2"></i>
              <p>Completed Tasks</p>
            </a>
          </li>
          <li class="navitem">
            <a href="{{Route('issue')}}" class="navlink">
              <i class="nc-icon nc-vector"></i>
              <p>Issue</p>
            </a>
          </li>
          <li class="navitem">
            <a href="{{Route('payment')}}" class="navlink">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Payment Method</p>
            </a>
          </li>
          <li class="navitem">
            <a href="{{Route('withdrawal_records')}}" class="navlink">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Withdrawal Records</p>
            </a>
          </li>
        </ul>
      </div>
    </div>