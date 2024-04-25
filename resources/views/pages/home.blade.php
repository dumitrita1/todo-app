@include('partials/header')

<h1 class='text'>ToDo</h1>

<p class='text'> Willkommen bei der </p>
  <p class='text'> ToDo App</p>

<img class ='img-home'src="/img/man-solving-problem.png" alt="Man solving problem">

@auth
  <button><a href="/logout">Abmelden</a></button>
@else
<div class='home-button'>
  <button class='home-button__link'><a href="/login"> Anmelden</a></button>
  <button class='home-button__link'><a href="/register"> Registrieren</a></button>
</div>
  @endauth

@include('partials/footer')
