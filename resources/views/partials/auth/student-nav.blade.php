<li class="parent" id="absen">
    <a href="{{ route('absen.me') }}" class=""><i class="fas fa-user-clock mr-3"></i>
        <span class="none">Absen Ku </span>
    </a>
</li>
<li class="parent {{ request()->is('student/task')?'active':'' }}" id="task">
    <a href="{{ route('task.index') }}" class=""><i class="fa fa-puzzle-piece mr-3"></i>
        <span class="none">Tugas </span>
    </a>
</li>
