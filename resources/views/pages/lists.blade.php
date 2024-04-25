@include('partials/header')
<div class="header">
<img class ='avatar-img'src="/img/avatar-bild.jpg" alt="frau">
<button class='menu-button '><a href="/">≡</a></button>
</div>

@if($list_status === 1)
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
@else
    <p>Sie müssen sich anmelden </p>
@endif

    <h1 class= "text">Aufgabe hinzufügen</h1>
    @if (!empty($tasks))
        <div class="checkbox_lists">
            @foreach ($tasks as $task)
                <div>
                    <input type="checkbox" name="" value="{{ $task->id }}">
                    <label>{{ $task->title }}</label>
                <div>
            @endforeach
        </div>
        <div class="add-list-container">
                <button class="add-list" type="button" onclick="addInput()">+</button>
            </div>

    @else  
        <form id="myForm" action="" method="POST">
            <div class="task-form" id="inputContainer">
                <div>
                    <label class="name-daten" for="name">Name:</label>
                    <input type="text" id="name" name="name">
                </div>
            </div>
            <div class="add-list-container">
                <button class="add-list" type="button" onclick="addInput()">+</button>
            </div>
        </form>

       
        <div class='save-button'>
            <button class="save-button__link" type="submit">Speichern</button>
        </div>
        @endif
    <script>
            function addInput() {
                var container = document.getElementsByClassName('task-form')[0];
                var newInput = document.createElement('div');
                newInput.innerHTML = '<input type="text" name="name">';
                container.appendChild(newInput);
            }
        </script>
  @include('partials/footer')