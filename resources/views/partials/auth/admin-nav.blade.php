<li class="parent">
    <a href="#" onclick="toggle_menu('data-master'); return false" class=""><i class="fa fa-pencil-square mr-3"></i>
        <span class="none">Data Master <i class="fa fa-angle-down pull-right align-bottom"></i></span>
    </a>
    <ul class="children" id="data-master">
        <li class="child" id="data-major"><a href="{{ route('major.index') }}" class="ml-4">Data Kelas</a></li>
        <li class="child" id="data-subject"><a href="{{ route('subject.index') }}" class="ml-4">Data Mata Pelajaran</a></li>
        <li class="child" id="data-teacher"><a href="{{ route('teacher.index') }}" class="ml-4">Data Guru</a></li>
        <li class="child" id="data-student"><a href="{{ route('student.index') }}" class="ml-4">Data Siswa</a></li>
    </ul>
</li>
<li class="parent" id="request_blog">
    <a href="{{ route('blog.request') }}" class=""><i class="fab fa-blogger-b mr-3"></i>
        <span class="none">Penyetujuan Blog </span>
    </a>
</li>
<li class="parent {{ request()->routeIs('gallery.*')?'active':'' }}">
    <a href="{{ route('gallery.index') }}" class=""><i class="fas fa-images mr-3"></i>
        <span class="none">Galeri</span>
    </a>
</li>
<li class="parent {{ request()->routeIs('desc_major.*')?'active':'' }}">
    <a href="{{ route('desc_major.index') }}" class=""><i class="fas fa-book mr-3"></i>
        <span class="none">Program Keahlian</span>
    </a>
</li>
<li class="parent {{ request()->routeIs('setting.*')?'active':'' }}">
    <a href="{{ route('setting.index') }}" class=""><i class="fa fa-gears mr-3"></i>
        <span class="none">Pengaturan</span>
    </a>
</li>
