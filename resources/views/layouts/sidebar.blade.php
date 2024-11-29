<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a href="#collapseExample" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">{{ Auth::user()->email }}</span>
                        </span>
                    </a>
                </div>
            </div>
            
            
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-user-graduate"></i>
                        <p>Siswa</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('kelas.index') ? 'active' : '' }}">
                    <a href="{{ route('kelas.index') }}">
                        <i class="fas fa-users"></i>
                        <p>Kelas</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('guru.index') ? 'active' : '' }}">
                    <a href="{{ route('guru.index') }}">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <p>Guru</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('pelajaran.index') ? 'active' : '' }}">
                    <a href="{{ route('pelajaran.index') }}">
                        <i class="fas fa-book-open"></i>
                        <p>Mata Pelajaran</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('guru_kelas_mapel.index') ? 'active' : '' }}">
                    <a href="{{ route('guru_kelas_mapel.index') }}">
                        <i class="fas fa-user-tie"></i>
                        <p>Guru Mata Pelajaran</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('siswaguru.kelas') ? 'active' : '' }}">
                    <a href="{{ route('siswaguru.kelas') }}">
                        <i class="fas fa-filter"></i>
                        <p>Data By Kelas</p>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block d-flex align-items-center justify-content-center" style="width: 100%; text-align: left; border-radius: 5px;">
                            <i class="fas fa-sign-out-alt me-2 mr-3"></i> 
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
                
            </ul>
        </div>
    </div>
</div>
