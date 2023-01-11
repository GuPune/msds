
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon" id="showicon">
            <img src="/cms/images/msd-logo.svg" style="height: auto; width: 100px;">
        </div>
    </a>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse"  data-target="#collapse11" aria-expanded="true" aria-controls="collapse">
            <i class="fas fa-fw fa-table"></i>
            <span>รายงาน</span>
        </a>

        <div  id="collapse11" class="collapse show'"aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/admin/reporttotal">
                   รายงานจำนวนผู้สมัคร
                </a>
                <a class="collapse-item" href="/admin/reportfirst">
                    รายงานการลงทะเบียนครั้งที่ 1
                 </a>
                 <a class="collapse-item" href="/admin/reporttwo">
                    รายงานการลงทะเบียนครั้งที่ 2
                 </a>
                 <a class="collapse-item" href="/admin/reportqa">
                    รายงาน Q&A
                 </a>
                 <a class="collapse-item" href="/admin/bepvoted">
                    ผลการโหวตคะแนนรอบเช้า
                 </a>
                 <a class="collapse-item" href="/admin/areportvoten">
                    ผลการโหวตคะแนนรอบบ่าย
                 </a>
            </div>
        </div>

    </li>

    <li class="nav-item">
        <a class="nav-link" href="/admin/carosel">
            <i class="fas fa-fw fa-table"></i>
            <span>ภาพสไลด์</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/users">
            <i class="nav-icon fas fa-edit"></i>
            <span>จัดการสมาชิก</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse"  data-target="#collapse12" aria-expanded="true" aria-controls="collapse">
            <i class="fas fa-fw fa-table"></i>
            <span>ผู้เข้าประกวด</span>
        </a>

        <div  id="collapse12" class="collapse show'"aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="/admin/setting/votess">
                    ผู้เข้าประกวด
                 </a>
                 <a class="collapse-item" href="/admin/votes">
                    ตั้งค่า
                 </a>
            </div>
        </div>

    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/regis">
            <i class="nav-icon fas fa-edit"></i>
            <span>จัดกการลงทะเบียน</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/admin/users">
            <i class="nav-icon fas fa-edit"></i>
            <span>ดูผลโหวต</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="/admin/qac">
            <i class="nav-icon fas fa-edit"></i>
            <span>Q&A</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout.perform') }}">
            <i class="nav-icon fas fa-edit"></i>
            <span>ออกจากระบบ</span>
        </a>
    </li>













{{--@foreach($setting as $settings)--}}

{{--    @if($settings['division'] == 'H')--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{$settings['url']}}">--}}
{{--            <i class="{{$settings['icon']}}"></i>--}}
{{--            <span>{{$settings['name']}}</span></a>--}}
{{--    </li>--}}

{{--        @elseif($settings['division'] == 'T')--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">--}}
{{--                    <i class="{{$settings['icon']}}"></i>--}}
{{--                    <span>--}}
{{--                         {{$settings['name']}}--}}
{{--                    </span>--}}
{{--                </a>--}}

{{--                <div id="collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                    <div class="bg-white py-2 collapse-inner rounded">--}}

{{--                        @foreach($setting as $key => $v)--}}
{{--@if($v['submenu'] == $settings['id'])--}}


{{--                        <a class="collapse-item" href="{{$v['url']}}">--}}
{{--                            {{$v['name']}}--}}
{{--                        </a>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--        @else--}}



{{--        @endif--}}
{{--@endforeach--}}


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
