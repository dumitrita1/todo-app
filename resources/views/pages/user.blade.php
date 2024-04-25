@include('partials/header')

<div class="header">
    <img class ='avatar-img'src="/img/{{$user->img}}" alt="">
    <p class= 'greeting-user'> Hallo  {{$user->name }} </p>
    <div >
        <button class='menu-button '>⚙</button>

        <form class='menu-form' id="myForm" action="{{route('register')}}" method="POST">
                    <div>
                        <input type="text" id="name" name="name">
                        <label class="" for="name">Name</label>
                    </div>
                    <div>
                        
                        <input class='' type="email" id="email" name="email">
                        <label class='' for="email">Email</label><br>
                    </div>
                    <div>
                    <input type="file" accept="img/*" id="fileInput">
                    <label class='' for="img">Bild</label><br>
                    </div>

                <div class="">
                    <button class="" type="button">✅</button>
                </div>
            </form>
    </div>
</div>
    @if ($lists->isEmpty())  
        <img class='user-blank__img' src="/img/notebook-with-stick.png" alt="Notebook with stick"> 
        <p class="text-add__task">Fügen Sie eine Aufgabe hinzu, um zu beginen</p> 
    @else ($list_status === 1)
    <p class= 'text-current-task'> Aktuelle Aufgabe </p>
    <div class='containers'>
    @foreach ($lists as $list) 
    <div class='list-container'>
        <div class="list-details">
            <h3>
                <a href="/list/{{ $list->slug }}">
                    {{ $list->name }} 
                </a>
            </h3>
            <p>
                {{ $list->description }} 
            </p>
        </div>
        <div class="progress-container">
            @include('partials/progress-circle', ['percentage' => 0.25])
        </div>
    </div>
    @endforeach 
    @endif
</div>

<button class='add-task'><a href="/task/team-auswahl/1">+<a></button>

<script>
    const circles = document.querySelectorAll('.progress-circle__value');

    for (const circle of circles) {
        const percentage = parseFloat(circle.getAttribute('data-percentage'));
        circle.setAttribute('stroke-dasharray', circle.getTotalLength());
        circle.setAttribute('stroke-dashoffset', (1 - percentage) * circle.getTotalLength());
    }

    const listContainers = document.querySelectorAll('.containers .list-container');

    function generateRandomColor() {
        const r = Math.floor(Math.random() * 256);
        const g = Math.floor(Math.random() * 256);
        const b = Math.floor(Math.random() * 256);

        return `rgb(${r}, ${g}, ${b})`;
    }

    listContainers.forEach(container => {
        const randomBorderColor = generateRandomColor();
        container.style.border = `2px solid ${randomBorderColor}`;
        
        const circle = container.querySelector('.progress-circle__value');
        circle.style.stroke = randomBorderColor;
    });


    document.querySelector('.menu-button').addEventListener('click', function() {
    var form = document.getElementById('myForm');
    var image = document.querySelector('.avatar-img');
    var greeting = document.querySelector('.greeting-user');

    if (form.style.display === 'none') {
        form.style.display = 'flex';
        image.style.display = 'none';
        greeting.style.display = 'none';
    } else {
        form.style.display = 'none';
        image.style.display = 'block';
        greeting.style.display = 'block';
    }
});


</script>

@include('partials/footer')