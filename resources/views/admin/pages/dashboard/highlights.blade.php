<div class="row quick-stats">

    @include('admin.components.cards.highlight', ['value' => $membership->count(), 'label' => 'Active Members', 'color' => 'indigo', 'icon' => 'users'])

    @include('admin.components.cards.highlight', ['value' => $lessonsCount, 'label' => 'Number of Classes', 'color' => 'orange', 'icon' => 'video'])

    @include('admin.components.cards.highlight', ['value' => $programsCount, 'label' => 'Number of Programs', 'color' => 'red', 'icon' => 'list'])

    @include('admin.components.cards.highlight', ['value' => $coursesCount, 'label' => 'Number of Courses', 'color' => 'pink', 'icon' => 'graduation-cap'])

    @include('admin.components.cards.highlight', ['value' => '$' . $membership->balance(), 'label' => 'Net Income', 'color' => 'blue', 'icon' => 'piggy-bank'])

    @include('admin.components.cards.highlight', ['value' => $asanasCount, 'label' => 'Number of Asanas', 'color' => 'amber', 'icon' => 'child'])

    @include('admin.components.cards.highlight', ['value' => $wallpapersCount, 'label' => 'Number of Wallpapers', 'color' => 'teal', 'icon' => 'images'])

    @include('admin.components.cards.highlight', ['value' => $articlesCount, 'label' => 'Number of Articles', 'color' => 'purple', 'icon' => 'book'])
</div>