    @if ($chapter->supportingMaterials()->exists())
    <div class="p-3">
      <p class="text-muted mb-1"><strong>{{$chapter->supportingMaterials->count()}} {{str_plural('download', $chapter->supportingMaterials->count())}}</strong></p>
      <ul class="list-style-none pl-2">
        @foreach($chapter->supportingMaterials as $material)
        <li><small>
          <a href="{{cloud($material->file_path)}}" target="_blank" class="link-red">
            <i class="far fa-file-alt mr-2"></i>{{$material->fullName}}
          </a>
        </small></li>
        @endforeach
      </ul>
    </div>
    @endif