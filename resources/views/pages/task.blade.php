@include('partials/header')

<div class="header">
    <img class='avatar-img' src="/img/avatar-bild.jpg" alt="frau">
    <button class='menu-button'><a href="/">≡</a></button>
</div>

<h1 class="text">Aufgabe hinzufügen</h1>

@if($list_status === 0)
    <form action="{{ route('task.create', $task->slug, $task->user_id->id) }}" method="POST">
        @csrf
        <div class="task-form">
            <div>
                <label class="title-daten" for="title">Titel:</label>
                <input type="text" id="title" name="title">
            </div>
            <div>
                <label class="description-daten" for="description">Beschreibung:</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <div>
                <label class="date-daten" for="date">Datum:</label>
                <input type="date" id="date" name="date">
            </div>
        </div>
        <div class='save-button'>
            <button class="save-button__link" type="submit">Speichern</button>
        </div>
    </form>

@endif

@include('partials/footer')
