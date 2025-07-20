<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <!-- مكتبة الأيقونات -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">

            <!-- الرئيسية -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"><i class="la la-home"></i>
                    <span class="menu-title">الرئيسية</span></a>
            </li>


            <!-- إدارة الموظفين -->
            <li class="nav-item">
                <a href="#"><i class="la la-id-card"></i>
                    <span class="menu-title">إدارة الموظفين</span>
                </a>
                <ul class="menu-content">
                    <li><a href="{{ route('employees.index') }}"><i class="la la-list"></i> جميع الموظفين</a></li>
                    <li><a href="{{ route('employees.create') }}"><i class="la la-plus-circle"></i> إضافة موظف جديد</a></li>
                    {{-- <li><a href="{{ route('employees.attachments') }}"><i class="la la-file-upload"></i> مرفقات الموظفين</a>
            </li> --}}
        </ul>
        </li>
        <!-- الهيكل التنظيمي -->
        <li class="nav-item">
            <a href="#"><i class="la la-sitemap"></i>
                <span class="menu-title">الهيكل التنظيمي</span>
            </a>
            <ul class="menu-content">
                <li><a href="{{ route('departments.index') }}"><i class="la la-layer-group"></i> الادارات والاقسام</a></li>
                <li><a href="{{ route('branches.index') }}"><i class="la la-code-branch"></i> الفروع</a></li>
                <li><a href="{{ route('jobs.index') }}"><i class="la la-briefcase"></i> الوظائف</a></li>
                <li><a href="{{ route('supervisors.index') }}"><i class="la la-user-tie"></i> المشرفين</a></li>
                <li><a href="{{ route('area-managers.index') }}"><i class="la la-map-marked-alt"></i> مديري المناطق</a></li>
            </ul>
        </li>
        shjdhdsdsdhsdhsdjs
        <!-- الرواتب والمكافآت -->
        <li class="nav-item">
            <a href="#"><i class="la la-money-bill-wave"></i>
                <span class="menu-title">الرواتب والمكافآت</span>
            </a>
            <ul class="menu-content">
                <li><a href="{{ route('salaries.index') }}"><i class="la la-file-invoice-dollar"></i> كشوف المرتبات</a></li>
                <li><a href="{{ route('commissions.index') }}"><i class="la la-gift"></i> المكافآت</a></li>
                <li><a href="{{ route('sanctions.index') }}"><i class="la la-hand-holding-usd"></i> الخصومات</a></li>
                <li><a href="{{ route('vacations.index') }}"><i class="la la-plane"></i> إجازات الموظفين</a></li>
            </ul>
        </li>

        <!-- التأمينات والبنوك -->
        <li class="nav-item">
            <a href="#"><i class="la la-shield-alt"></i>
                <span class="menu-title">التأمينات والبنوك</span>
            </a>
            <ul class="menu-content">
                <li><a href=""><i class="la la-user-shield"></i> التأمينات الاجتماعية</a></li>
                <li><a href=""><i class="la la-heartbeat"></i> التأمين الصحي</a></li>
                <li><a href="{{ route('bank-accounts.index') }}"><i class="la la-university"></i> الحسابات البنكية</a></li>
            </ul>
        </li>

        <!-- التقارير -->
        <li class="nav-item">
            <a href="#"><i class="la la-file-alt"></i>
                <span class="menu-title">التقارير</span>
            </a>
            <ul class="menu-content">
                <li><a href="{{ route('reports.employees') }}"><i class="la la-users"></i> تقارير الموظفين</a></li>
                <li><a href="{{ route('reports.salaries') }}"><i class="la la-file-invoice"></i> تقارير الرواتب</a></li>
            </ul>
        </li>

        </ul>
        </li>
        </ul>
    </div>
</div>
