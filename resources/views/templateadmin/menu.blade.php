{{-- @php


    $getid = Auth::user()->id;

@endphp --}}
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <div class="d-flex sidebar-profile">
          <div class="sidebar-profile-image">
            <img src="{{ asset('cms/images/faces/face29.png') }}" alt="image">

            <span class="sidebar-status-indicator"></span>
          </div>
          <div class="sidebar-profile-name">
            <p class="sidebar-name">
                @auth
                {{Auth::user()->name}}
                @endauth
            </p>

          </div>
        </div>

        <p class="sidebar-menu-title">Dash menu</p>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/dashboard">
          <i class="typcn typcn-device-desktop menu-icon"></i>
          <span class="menu-title">ภาพรวม</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/pos">
          <i class="typcn typcn-device-desktop menu-icon"></i>
          <span class="menu-title">หน้าขาย</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-salesorderx" aria-expanded="false" aria-controls="form-salesorderx">
            <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">จัดการขาย</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-salesorderx">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link" href="/admin/salesorder">S01 รายการงานทั้งหมด</a></li>
            </ul>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-report" aria-expanded="false" aria-controls="form-report">
            <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">รายงาน</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-report">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/reportday">R01 สรุปรายรับรายรับ (รายวัน)</a></li>
            </ul>
          </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-slid" aria-expanded="false" aria-controls="form-slid">
            <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">ตั้งค่าผู้ใช้งาน</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-slid">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/users">ผู้ใช้งาน</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/roles">สิทธิผู้ใช้งาน</a></li>
            </ul>
          </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-ord" aria-expanded="false" aria-controls="form-ord">
            <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">รายการอาหาร</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-ord">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/restu">อาหาร</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/typeres">ประเภทอาหาร</a></li>
            </ul>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-toe" aria-expanded="false" aria-controls="form-toe">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
          <span class="menu-title">รายการโต๊ะอาหาร</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-toe">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/toe">โต๊ะอาหาร</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/zone">โซนโต๊ะ</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/toezonesetting">ตั้งค่า</a></li>
            </ul>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-order" aria-expanded="false" aria-controls="form-order">
            <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">รายการครัว</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-order">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/orderrest">
                ออเดอร์อาหาร</a>
            </li>
            <li class="nav-item"> <a class="nav-link" href="/admin/orderdrink">
                บาร์น้ำ</a>
            </li>
            </ul>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-rating" aria-expanded="false" aria-controls="form-rating">
            <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">คะแนน</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-rating">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/rating">คะแนนที่ลูกค้าให้</a></li>

            </ul>
          </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-setting" aria-expanded="false" aria-controls="form-setting">
            <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">ตั้งค่าระบบ</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-setting">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/setting">ตั้งค่า</a></li>
            </ul>
          </div>
      </li>




      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-contact" aria-expanded="false" aria-controls="form-contact">
         <i class="typcn typcn-th-small-outline menu-icon"></i>
          <span class="menu-title">ติดต่อ</span>
          <i class="menu-arrow"></i>
        </a>

        <div class="collapse" id="form-contact">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/contact">ข้อมูลติดต่อ</a></li>

            </ul>
          </div>
      </li> --}}

      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-multi" aria-expanded="false" aria-controls="form-multi">
            <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">ตั้งค่าภาษา </span>
          <i class="menu-arrow"></i>
        </a>

        <div class="collapse" id="form-multi">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/mutli/menu">Menu</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/mutli/input">Input</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/mutli/message">Message</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/title">Title</a></li>
            </ul>
          </div>
      </li> --}}
  </nav>
