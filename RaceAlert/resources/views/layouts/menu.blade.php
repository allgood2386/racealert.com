<li class="{{ Request::is('races*') ? 'active' : '' }}">
    <a href="{!! route('races.index') !!}"><i class="fa fa-edit"></i><span>Races</span></a>
</li>

<li class="{{ Request::is('tracks*') ? 'active' : '' }}">
    <a href="{!! route('tracks.index') !!}"><i class="fa fa-edit"></i><span>Tracks</span></a>
</li>

<li class="{{ Request::is('trackConfigurations*') ? 'active' : '' }}">
    <a href="{!! route('trackConfigurations.index') !!}"><i class="fa fa-edit"></i><span>Track Configurations</span></a>
</li>

