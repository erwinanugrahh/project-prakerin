<li class="parent">
    <a href="#" onclick="toggle_menu('data-master'); return false" class=""><i class="fa fa-pencil-square mr-3"></i>
        <span class="none">Data Master <i class="fa fa-angle-down pull-right align-bottom"></i></span>
    </a>
    <ul class="children" id="data-master">
        <li class="child" id="data-major"><a href="{{ route('major.index') }}" class="ml-4">Data Kelas</a></li>
        <li class="child" id="data-subject"><a href="{{ route('subject.index') }}" class="ml-4">Data Mata Pelajaran</a></li>
        <li class="child" id="data-teacher"><a href="{{ route('teacher.index') }}" class="ml-4">Data Guru</a></li>
        <li class="child" id="data-student"><a href="{{ route('student.index') }}" class="ml-4">Data Siswa</a></li>
        <li class="child" id="data-blogger"><a href="{{ route('blogger.index') }}" class="ml-4">Data Blogger</a></li>
    </ul>
</li>
<li class="parent">
    <a href="widgets.html" class=""><i class="fa fa-puzzle-piece mr-3"></i>
        <span class="none">Widget </span>
    </a>
</li>