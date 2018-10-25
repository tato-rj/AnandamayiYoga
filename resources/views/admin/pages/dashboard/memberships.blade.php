<div class="rounded border">
    <div class="card-body">
        <h4>Users at a glance</h4>
        <p>Flow of new memberships over the past year</p>
        <canvas id="glance-chart" data-counts="{{json_encode($membershipsAtGlance)}}" height="100"></canvas>
    </div>
</div>