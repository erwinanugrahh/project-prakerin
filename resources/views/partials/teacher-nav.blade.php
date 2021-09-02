<li class="parent">
    <a href="#" onclick="toggle_menu('data-absen'); return false" class=""><i class="fas fa-user-clock mr-3"></i>
        <span class="none">Absen <i class="fa fa-angle-down pull-right align-bottom"></i></span>
    </a>
    <ul class="children" id="data-absen">
        <li class="child" id="absen"><a href="{{ route('absen.index') }}" class="ml-4">Absen Hari Ini</a></li>
        <li class="child" id="history-absen"><a href="{{ route('absen.history') }}" class="ml-4">Histori Absen</a></li>
    </ul>
</li>
<li class="parent" id="lesson">
    <a href="{{ route('lesson.index') }}" class=""><i class="fa fa-book mr-3"></i>
        <span class="none">Materi </span>
    </a>
</li>

